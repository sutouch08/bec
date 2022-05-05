<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends PS_Controller
{
  public $menu_code = 'DBPDMD';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Model';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_model';
    $this->load->model('masters/product_model_model');
  }


  public function index()
  {
    $filter = array(
      'code'      => get_filter('code', 'model_code', ''),
      'name'      => get_filter('name', 'model_name', '')
    );

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = 20;
		}

		$segment  = 4; //-- url segment
		$rows     = $this->product_model_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	    = pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$model    = $this->product_model_model->get_list($filter, $perpage, $this->uri->segment($segment));

    $data = array();


    $filter['data'] = $model;

		$this->pagination->initialize($init);
    $this->load->view('masters/product_model/product_model_list', $filter);
  }


  public function add_new()
  {
    $this->title = 'Add Product Model';
    $this->load->view('masters/product_model/product_model_add_view');
  }



  public function edit($code)
  {
    $this->title = 'Edit Product Model';
    $data = $this->product_model_model->get($code);

    $this->load->view('masters/product_model/product_model_edit_view', $data);
  }





  public function clear_filter()
	{
		return clear_filter(array('model_code', 'model_name'));
	}


}//--- end class
 ?>
