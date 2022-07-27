<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category extends PS_Controller
{
  public $menu_code = 'DBPDCR';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Category';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_category';
    $this->load->model('masters/product_category_model');
		$this->load->helper('product_category');
  }


  public function index()
  {
		$filter = array(
			'code' => get_filter('code', 'caCode', ''),
			'name' => get_filter('name', 'caName', ''),
			'level' => get_filter('level', 'caLevel', 'all'),
			'parent' => get_filter('parent', 'caParent', 'all')
		);

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();

		$rows = $this->product_category_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);

		$filter['data'] = $this->product_category_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$this->pagination->initialize($init);

    $this->load->view('masters/product_category/category_list', $filter);
  }


  public function add_new()
  {
    $this->title = 'New Category';
    $this->load->view('masters/product_category/category_add');
  }


	public function edit($id)
  {
    $this->title = 'Edit Category';

		if($this->pm->can_edit)
		{
			$data = $this->product_category_model->get($id);
			$this->load->view('masters/product_category/category_edit', $data);
		}
		else
		{
			$this->permission_deny();
		}
  }



	public function view_detail($id)
	{
		$data = $this->product_category_model->get($id);
		$this->load->view('masters/product_category/category_detail', $data);
	}



	public function add()
	{
		$sc = TRUE;
		$code = trim($this->input->post('code'));
		$name = trim($this->input->post('name'));
		$parent_id = $this->input->post('parent_id');

		if($this->pm->can_add)
		{
			if( ! $this->product_category_model->is_exists_code($code))
			{
				if( ! $this->product_category_model->is_exists_name($name))
				{
					$parent = $this->product_category_model->get($parent_id);

					$level = (empty($parent) ? 1 : $parent->level + 1);

					$arr = array(
						'code' => $code,
						'name' => $name,
						'level' => $level,
						'parent_id' => $parent_id
					);

					if( ! $this->product_category_model->add($arr))
					{
						$sc = FALSE;
						set_error('insert');
					}
				}
				else
				{
					$sc = FALSE;
					set_error('exists', $name);
				}
			}
			else
			{
				$sc = FALSE;
				set_error('exists', $code);
			}
		}
		else
		{
			$sc = FALSE;
			set_error('permission');
		}

		$this->_response($sc);
	}



  public function update()
  {
    $sc = TRUE;

    if($this->input->post('id'))
    {
			$id = $this->input->post('id');
      $name = trim($this->input->post('name'));
			$parent_id = $this->input->post('parent_id');

			//--- check name
			if( ! $this->product_category_model->is_exists_name($name, $id))
			{
				$parent = $this->product_category_model->get($parent_id);
				$level = empty($parent) ? 1 : $parent->level + 1;

				$arr = array(
					'name' => $name,
					'level' => $level,
					'parent_id' => $parent_id
				);

				if(! $this->product_category_model->update($id, $arr))
				{
					$sc = FALSE;
					set_error('update');
				}
				else
				{
					$this->update_child_level($id);
				}
			}
			else
			{
				$sc = FALSE;
				set_error('exists', $name);
			}

    }
    else
    {
      $sc = FALSE;
      set_error('required');
    }

		$this->_response($sc);
  }



	private function update_child_level($id)
	{
		$cate = $this->product_category_model->get($id);

		if( ! empty($cate))
		{
			if($this->product_category_model->has_child($id))
			{
				$child = $this->product_category_model->get_by_parent($id);

				if(!empty($child))
				{
					foreach($child as $rs)
					{
						$arr = array(
							'level' => $cate->level + 1
						);

						$this->product_category_model->update($rs->id, $arr);

						$this->update_child_level($rs->id);
					}
				}
			}
		}
	}


  public function clear_filter()
	{
		$filter = array('caName', 'caLevel', 'caParent', 'caCode');
    clear_filter($filter);
	}

}//--- end class
 ?>
