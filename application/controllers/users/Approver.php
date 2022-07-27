<?php
class Approver extends PS_Controller
{
	public $menu_code = "SCAPPV";
	public $menu_group_code = "SC";
	public $title = "Approval";

	public function __construct()
	{
		parent::__construct();
		$this->home = base_url()."users/approver";
		$this->load->model("users/approver_model");
		$this->load->helper("approver");
		$this->segment = 4;
	}


	public function index()
	{
		$filter = array(
			'uname' => get_filter('uname', 'ap_uname', ''),
			'name' => get_filter('name', 'ap_name', ''),
			'team' => get_filter('team', 'ap_team', 'all'),
			'status' => get_filter('status', 'ap_status', 'all')
		);

		$perpage = get_rows();

		$rows = $this->approver_model->count_rows($filter);

		$init = pagination_config($this->home.'/index/',$rows, $perpage, $this->segment);

		$approvers = $this->approver_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$filter['data'] = $approvers;

		$this->pagination->initialize($init);

		$this->load->view('approver/approver_list', $filter);
	}



	public function add_new()
	{
		$this->title = "Add Approver";

		if($this->pm->can_add)
		{
			$this->load->view('approver/approver_add');
		}
		else
		{
			$this->permission_deny();
		}
	}



	public function add()
	{
		$sc = TRUE;

		if($this->pm->can_add)
		{
			$user_id = $this->input->post('user_id');
			$team_id = $this->input->post('team_id');
			$disc = round($this->input->post('disc'), 2);
			$status = $this->input->post('status') == 1 ? 1 : 0;

			if( ! empty($user_id) && ! empty($team_id) && ! empty($disc))
			{
				if($disc > 0 && $disc <= 100)
				{
					if( ! $this->approver_model->is_exists_data($user_id, $team_id, $disc))
					{
						$arr = array(
							'user_id' => $user_id,
							'team_id' => $team_id,
							'max_disc' => $disc,
							'status' => $status
						);

						if( ! $this->approver_model->add($arr))
						{
							$sc = FALSE;
							set_error('insert', 'approver');
						}
					}
					else
					{
						$sc = FALSE;
						set_error('exists', "This data");
					}
				}
				else
				{
					$sc = FALSE;
					$this->error = "Discount must in range 0.1 - 100";
				}
			}
			else
			{
				$sc = FALSE;
				set_error('required', ' : form data');
			}
		}
		else
		{
			$sc = FALSE;
			set_error('permission');
		}

		$this->_response($sc);
	}




	public function edit($id)
	{
		$this->title = "Edit Approver";

		if($this->pm->can_edit)
		{
			$approver = $this->approver_model->get($id);
			$this->load->view('approver/approver_edit', $approver);
		}
		else
		{
			$this->permission_deny();
		}
	}



	public function update()
	{
		$sc = TRUE;

		if($this->pm->can_edit)
		{
			$id = $this->input->post('id');
			$user_id = $this->input->post('user_id');
			$team_id = $this->input->post('team_id');
			$disc = round($this->input->post('disc'), 2);
			$status = $this->input->post('status') == 1 ? 1 : 0;

			if( ! empty($id) && ! empty($user_id) && ! empty($team_id) && ! empty($disc))
			{
				if($disc > 0 && $disc <= 100)
				{
					if( ! $this->approver_model->is_exists_data($user_id, $team_id, $disc, $id))
					{
						$arr = array(
							'user_id' => $user_id,
							'team_id' => $team_id,
							'max_disc' => $disc,
							'status' => $status
						);

						if( ! $this->approver_model->update($id, $arr))
						{
							$sc = FALSE;
							set_error('update', 'approver');
						}
					}
					else
					{
						$sc = FALSE;
						set_error('exists', "This data");
					}
				}
				else
				{
					$sc = FALSE;
					$this->error = "Discount must in range 0.1 - 100";
				}
			}
			else
			{
				$sc = FALSE;
				set_error('required', ' : form data');
			}
		}
		else
		{
			$sc = FALSE;
			set_error('permission');
		}

		$this->_response($sc);
	}



	public function delete()
	{
		$sc = TRUE;

		if($this->pm->can_delete)
		{
			$id = $this->input->post('id');

			if( ! empty($id))
			{
				if( ! $this->approver_model->delete($id))
				{
					$sc = FALSE;
					set_error('delete');
				}
			}
			else
			{
				$sc = FALSE;
				set_error('required', 'id');
			}
		}
		else
		{
			$sc = FALSE;
			set_error('permission');
		}

		$this->_response($sc);
	}


	public function clear_filter()
	{
		return clear_filter(array('ap_uname', 'ap_name', 'ap_team', 'ap_status'));
	}

}

 ?>
