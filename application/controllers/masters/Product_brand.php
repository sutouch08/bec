<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_brand extends PS_Controller
{
  public $menu_code = 'DBPDBR';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Brand';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_brand';
    $this->load->model('masters/product_brand_model');
  }


  public function index()
  {
		$filter = array(
			'name' => get_filter('name', 'brand_name', ''),
			'code' => get_filter('code', 'brand_code', '')
		);


		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();

		$rows = $this->product_brand_model->count_rows($filter);
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->product_brand_model->get_list($filter, $perpage, $this->uri->segment($this->segment));
		$this->pagination->initialize($init);
    $this->load->view('masters/product_brand/product_brand_list', $filter);
  }


	public function add_new()
	{
		$this->load->view('masters/product_brand/product_brand_add');
	}


	public function add()
	{
		$sc = TRUE;
		$name = trim($this->input->post('name'));

		if( ! empty($name))
		{
			if( ! $this->product_brand_model->is_exists_name($name))
			{
				$arr = array(
					'name' => $name
				);

				if( ! $this->product_brand_model->add($arr))
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
    $data = $this->product_brand_model->get($id);
    $this->load->view('masters/product_brand/product_brand_edit', $data);
  }



	public function update()
	{
		$sc = TRUE;

		$id = $this->input->post('id');
		$name = trim($this->input->post('name'));

		if($this->product_brand_model->is_exists_name($name, $id))
		{
			$sc = FALSE;
			set_error('exists', $name);
		}
		else
		{
			$arr = array(
				'name' => $name
			);

			if( ! $this->product_brand_model->update($id, $arr))
			{
				$sc = FALSE;
				set_error('update');
			}
			else
			{
				//--- send update to SAP
				$this->update_sap($id);
			}
		}

		$this->_response($sc);
	}



	public function sync_data()
	{
		$sc = TRUE;
		$this->load->library('api');

		$res = $this->api->getProductBrandUpdateData();

		if(! empty($res))
		{
			foreach($res as $rs)
			{
				$cr = $this->product_brand_model->get_by_code($rs->id);

				if(empty($cr))
				{
					$arr = array(
						"code" => $rs->id,
						"name" => $rs->name,
						"last_sync" => now()
					);

					$this->product_brand_model->add($arr);
				}
				else
				{
					$arr = array(
						"name" => $rs->name,
						"last_sync" => now()
					);

					$this->product_brand_model->update($cr->id, $arr);
				}
			}
		}

		$this->_response($sc);
	}



	private function update_sap($id)
	{
		$rs = $this->product_brand_model->get($id);

		if( ! empty($rs))
		{
			$this->load->library('update_api');
			$arr = array(
				'id' => $rs->code,
				'name' => $rs->name
			);

			return $this->update_api->updateProductBrand($arr);
		}

		return FALSE;
	}



  public function clear_filter()
	{
		$filter = array('brand_code', 'brand_name');

		return clear_filter($filter);
	}

}//--- end class
 ?>
