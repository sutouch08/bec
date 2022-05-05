<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_kind extends PS_Controller
{
  public $menu_code = 'DBCKIN';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customer Kind';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customer_kind';
    $this->load->model('masters/customer_kind_model');
  }


  public function index()
  {
		$code = get_filter('code', 'kind_code', '');
		$name = get_filter('name', 'kind_name', '');

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->customer_kind_model->count_rows($code, $name);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$rs = $this->customer_kind_model->get_data($code, $name, $perpage, $this->uri->segment($segment));
    $ds = array(
      'code' => $code,
      'name' => $name,
			'data' => $rs
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/customer_kind/customer_kind_view', $ds);
  }


  public function add_new()
  {
    $this->title = 'Add customer kind';
    $this->load->view('masters/customer_kind/customer_kind_add_view');
  }




  public function edit($code)
  {
    $this->title = 'Edit customer kind';
    $rs = $this->customer_kind_model->get($code);
    $data = array(
      'code' => $rs->code,
      'name' => $rs->name
    );

    $this->load->view('masters/customer_kind/customer_kind_edit_view', $data);
  }



  public function clear_filter()
	{
		return clear_filter(array('kind_code', 'kind_name'));	
	}

}//--- end class
 ?>
