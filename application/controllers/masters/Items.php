<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends PS_Controller
{
  public $menu_code = 'DBITEM';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Products';
  public $error = '';
	public $wms;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/items';

    //--- load model
    $this->load->model('masters/product_kind_model');
    $this->load->model('masters/product_type_model');
    $this->load->model('masters/product_brand_model');
    $this->load->model('masters/product_category_model');
    $this->load->model('masters/product_tab_model');

    //---- load helper
    $this->load->helper('product_tab');
    $this->load->helper('product_brand');
    $this->load->helper('product_kind');
    $this->load->helper('product_category');
    $this->load->helper('product_images');

  }


  public function index()
  {
    $filter = array(
      'code'      => get_filter('code', 'item_code', ''),
      'name'      => get_filter('name', 'item_name', ''),
      'category'  => get_filter('category', 'category', ''),
      'kind'      => get_filter('kind', 'kind', ''),
      'type'      => get_filter('type', 'type', ''),
      'brand'     => get_filter('brand', 'brand', '')      
    );

    $this->load->view('masters/product_items/items_list', $filter);
  }


  public function edit()
  {
		$this->title = "Edit Product";
		$this->load->view('masters/product_items/items_edit_view');
  }

  public function clear_filter()
	{
    $filter = array('item_code','item_name','item_barcode','color', 'size','group','sub_group','category','kind','type','brand','year');
    clear_filter($filter);
	}
}

?>
