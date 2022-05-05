<?php
class Approver extends PS_Controller
{
	public $menu_code = "SCAPPV";
	public $menu_group_code = "SC";
	public $title = "Approver";

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

		$perpage = get_filter('set_rows', 'rows', 20);

		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

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
		$this->load->view('approver/approver_add');
	}


	public function edit($id)
	{
		$this->title = "Edit Approver";
		$approver = $this->approver_model->get($id);

		$this->load->view('approver/approver_edit', $approver);
	}


	public function clear_filter()
	{
		return clear_filter(array('ap_uname', 'ap_name', 'ap_team', 'ap_status'));
	}

}

 ?>
