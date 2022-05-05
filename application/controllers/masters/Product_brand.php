<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_brand extends PS_Controller
{
  public $menu_code = 'DBPDBR';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Brand';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_brand';
    $this->load->model('masters/product_brand_model');
  }


  public function index()
  {
		$code = get_filter('code', 'code', '');
		$name = get_filter('name', 'name', '');

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->product_brand_model->count_rows($code, $name);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$brand = $this->product_brand_model->get_data($code, $name, $perpage, $this->uri->segment($segment));

    $ds = array(
      'code' => $code,
      'name' => $name,
			'data' => $brand
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/product_brand/product_brand_view', $ds);
  }


  public function add_new()
  {
    $this->title = 'Add Brand';
    $this->load->view('masters/product_brand/product_brand_add_view');
  }



  public function edit($code)
  {
    $this->title = 'Edit Brand';
    $rs = $this->product_brand_model->get($code);
    $data = array(
      'code' => $rs->code,
      'name' => $rs->name
    );

    $this->load->view('masters/product_brand/product_brand_edit_view', $data);
  }



  public function clear_filter()
	{
		clear_filter(array('code', 'name'));
	}

}//--- end class
 ?>
