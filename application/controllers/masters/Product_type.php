<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type extends PS_Controller
{
  public $menu_code = 'DBPTYP';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Type';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_type';
    $this->load->model('masters/product_type_model');
  }


  public function index()
  {
    $filter = array(
      'name'      => get_filter('name', 'pt_name', '')
    );

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();

		$rows     = $this->product_type_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	    = pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->product_type_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$this->pagination->initialize($init);
    $this->load->view('masters/product_type/product_type_list', $filter);
  }


	public function add_new()
	{
		$this->load->view('masters/product_type/product_type_add');
	}


	public function add()
	{
		$sc = TRUE;
		$name = trim($this->input->post('name'));

		if( ! empty($name))
		{
			if( ! $this->product_type_model->is_exists_name($name))
			{
				$arr = array(
					'name' => $name
				);

				if( ! $this->product_type_model->add($arr))
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
			set_error('required');
		}

		$this->_response($sc);
	}


	public function edit($id)
  {
    $data = $this->product_type_model->get($id);
    $this->load->view('masters/product_type/product_type_edit', $data);
  }



	public function update()
	{
		$sc = TRUE;

		$id = $this->input->post('id');
		$name = trim($this->input->post('name'));

		if($this->product_type_model->is_exists_name($name, $id))
		{
			$sc = FALSE;
			set_error('exists', $name);
		}
		else
		{
			$arr = array(
				'name' => $name
			);

			if( ! $this->product_type_model->update($id, $arr))
			{
				$sc = FALSE;
				set_error('update');
			}
		}

		//--- send update to SAP
		$this->update_sap($id, $name);

		$this->_response($sc);
	}



	public function sync_data()
	{
		$sc = TRUE;

		$response = json_encode(array(
			array('id' => 1, 'name' => 'หลอดไฟ'),
			array('id' => 2, 'name' => 'เฟอร์นิเจอร์'),
			array('id' => 3, 'name' => 'โซล่าเซล'),
			array('id' => 4, 'name' => 'อุปกรณ์ไฟฟ้า')
		));

		$res = json_decode($response);


		if(! empty($res))
		{
			foreach($res as $rs)
			{
				$cr = $this->product_type_model->get($rs->id);

				if(empty($cr))
				{
					$arr = array(
						"id" => $rs->id,
						"name" => $rs->name
					);

					$this->product_type_model->add($arr);
				}
				else
				{
					$arr = array(
						"name" => $rs->name
					);

					$this->product_type_model->update($rs->id, $arr);
				}
			}
		}

		$this->_response($sc);
	}



	private function update_sap($id, $name)
	{
		return TRUE;
	}


  public function clear_filter()
	{
		return clear_filter(array('pt_name'));
	}


}//--- end class
 ?>
