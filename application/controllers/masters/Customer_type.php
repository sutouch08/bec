<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_type extends PS_Controller
{
  public $menu_code = 'DBCTYP';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customer type';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customer_type';
    $this->load->model('masters/customer_type_model');
  }


  public function index()
  {
		$code = get_filter('code', 'type_code', '');
		$name = get_filter('name', 'type_name', '');

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->customer_type_model->count_rows($code, $name);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$rs = $this->customer_type_model->get_data($code, $name, $perpage, $this->uri->segment($segment));
    $ds = array(
      'code' => $code,
      'name' => $name,
			'data' => $rs
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/customer_type/customer_type_view', $ds);
  }


  public function add_new()
  {
    $this->title = 'Add customer type';
    $this->load->view('masters/customer_type/customer_type_add_view');
  }


  public function edit($code)
  {
    $this->title = 'Edit customer type';
    $rs = $this->customer_type_model->get($code);
    $data = array(
      'code' => $rs->code,
      'name' => $rs->name
    );

    $this->load->view('masters/customer_type/customer_type_edit_view', $data);
  }



  public function clear_filter()
	{
		return clear_filter(array('type_code', 'type_name'));
	}

}//--- end class
 ?>
