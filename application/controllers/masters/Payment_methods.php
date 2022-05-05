<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_methods extends PS_Controller
{
  public $menu_code = 'DBPAYM';
	public $menu_group_code = 'DB';
	public $title = 'Payment channels';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/payment_methods';
    $this->load->model('masters/payment_methods_model');
  }


  public function index()
  {
		$code = get_filter('code', 'payment_code', '');
		$name = get_filter('name', 'payment_name', '');
    $term = get_filter('term', 'payment_term', 0);

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->payment_methods_model->count_rows($code, $name, $term);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$rs = $this->payment_methods_model->get_data($code, $name, $term, $perpage, $this->uri->segment($segment));
    $ds = array(
      'code' => $code,
      'name' => $name,
      'term' => $term,
			'data' => $rs
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/payment_methods/payment_methods_view', $ds);
  }


  public function add_new()
  {
    $this->title = 'New payment channels';
    $this->load->view('masters/payment_methods/payment_methods_add_view');
  }



  public function edit($code)
  {
    $this->title = 'Edit Payment channels';
    $data = $this->payment_methods_model->get_payment_methods($code);

    $this->load->view('masters/payment_methods/payment_methods_edit_view', $data);
  }



  public function clear_filter()
	{
		clear_filter(array('payment_code', 'payment_name', 'payment_term'));
		echo 'done';
	}

}//--- end class
 ?>
