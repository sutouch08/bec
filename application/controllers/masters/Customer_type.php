<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_type extends PS_Controller
{
  public $menu_code = 'DBCTYP';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customer type';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customer_type';
    $this->load->model('masters/customer_type_model');
  }


  public function index()
  {
    $filter = array(
      "name" => get_filter('name', 'type_name', '')
    );

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();


		$rows = $this->customer_type_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->customer_type_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$this->pagination->initialize($init);
    $this->load->view('masters/customer_type/customer_type_list', $filter);
  }


  public function edit($id)
  {
    $data = $this->customer_type_model->get($id);
    $this->load->view('masters/customer_type/customer_type_edit', $data);
  }



	public function update()
	{
		$sc = TRUE;

		$id = $this->input->post('id');
		$name = trim($this->input->post('name'));

		if($this->customer_type_model->is_exists($name, $id))
		{
			$sc = FALSE;
			set_error('exists', $name);
		}
		else
		{
			$arr = array(
				'name' => $name
			);

			if( ! $this->customer_type_model->update($id, $arr))
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
			array("id" => 1, "name" => "ห้างใหญ่"),
			array("id" => 2, "name" => "ร้านค้าส่ง"),
			array("id" => 3, "name" => "โครงการของรัฐ"),
			array("id" => 4, "name" => "โครงการเอกชน"),
			array("id" => 5, "name" => "ผู้รับเหมารายใหญ่"),
			array("id" => 6, "name" => "ผู้รับเหมารายย่อย"),
			array("id" => 7, "name" => "ลูกค้าทั่วไป")
		));

		$res = json_decode($response);


		if(! empty($res))
		{
			foreach($res as $rs)
			{
				$cr = $this->customer_type_model->get($rs->id);

				if(empty($cr))
				{
					$arr = array(
						"id" => $rs->id,
						"name" => $rs->name
					);

					$this->customer_type_model->add($arr);
				}
				else
				{
					$arr = array(
						"name" => $rs->name
					);

					$this->customer_type_model->update($rs->id, $arr);
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
		return clear_filter(array('type_name'));
	}

}//--- end class
 ?>
