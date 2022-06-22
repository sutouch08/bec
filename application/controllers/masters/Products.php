<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends PS_Controller
{
  public $menu_code = 'DBPROD';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Products';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/products';

    //--- load model
    $this->load->model('masters/products_model');

    //---- load helper
    $this->load->helper('products');
    $this->load->helper('product_images');

  }


  public function index()
  {
    $filter = array(
      'code' => get_filter('code', 'item_code', ''),
      'name' => get_filter('name', 'item_name', ''),
			'model' => get_filter('model', 'item_model', ''),
      'category' => get_filter('category', 'item_category', 'all'),
      'type' => get_filter('type', 'item_type', 'all'),
      'brand' => get_filter('brand', 'item_brand', 'all'),
			'status' => get_filter('status', 'item_status', 'all')
    );

		$perpage = get_rows();

		$rows = $this->products_model->count_rows($filter);
		$init = pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->products_model->get_list($filter, $perpage, $this->uri->segment($this->segment));
		$this->pagination->initialize($init);
    $this->load->view('masters/products/products_list', $filter);
  }



	public function edit($id)
	{
		if($this->pm->can_edit)
		{
			$rs = $this->products_model->get_by_id($id);

			if( ! empty($rs))
			{
				$this->load->view('masters/products/products_edit', $rs);
			}
			else
			{
				$this->page_error();
			}
		}
		else
		{
			$this->permission_page();
		}
	}



	public function update()
	{
		$sc = TRUE;

		if($this->pm->can_edit)
		{
			if($this->input->post('id'))
			{
				$id = $this->input->post('id');

				$arr = array(
					'model_id' => get_null($this->input->post('model')),
					'brand_id' => get_null($this->input->post('brand')),
					'category_id' => get_null($this->input->post('category')),
					'type_id' => get_null($this->input->post('type')),
					'is_cover' => $this->input->post('cover') == 1 ? 1 : 0
				);

				if( ! $this->products_model->update($id, $arr))
				{
					$sc = FALSE;
					set_error('update');
				}
			}
			else
			{
				$sc = FALSE;
				set_error('required');
			}
		}
		else
		{
			$sc = FALSE;
			set_error('permission');
		}

		$this->_response($sc);
	}



	public function view_detail($id)
	{
		$rs = $this->products_model->get_by_id($id);

		if( ! empty($rs))
		{
			$this->load->view('masters/products/products_detail', $rs);
		}
		else
		{
			$this->page_error();
		}
	}


	public function search_model()
	{
		$sc = array();

		$txt = $_REQUEST['term'];

		$query = "SELECT * FROM product_model WHERE id IS NOT NULL ";
		if($txt != "*")
		{
			$query .= "AND name LIKE '%{$txt}' ";
		}

		$query .= "ORDER BY name ASC LIMIT 50";

		$rs = $this->db->query($query);

		if($rs->num_rows() > 0)
		{
			foreach($rs->result() as $rd)
			{
				$sc[] = $rd->name.' | '.$rd->id;
			}
		}
		else
		{
			$sc[] = "not found";
		}

		echo json_encode($sc);
	}



	public function change_image()
	{
		$sc = TRUE;

		if($this->input->post('id') && $this->input->post('code'))
		{
			$file = isset( $_FILES['image'] ) ? $_FILES['image'] : FALSE;
			$id = $this->input->post('id');
			$code = $this->input->post('code'); //--- item code

			if($file !== FALSE)
			{
				;
				if(! $this->do_upload($file, $id, $code))
				{
					$sc = FALSE;
				}
			}
			else
			{
				$sc = FALSE;
				$this->error = "File not found";
			}
		}
		else
		{
			$sc = FALSE;
			set_error('required');
		}

		$this->_response($sc);
	}


	public function do_upload($file, $product_id)
	{
		$sc = TRUE;
    $this->load->library('upload');

		$img_name 	= $product_id; //-- ตั้งชื่อรูปตาม id_product
		$image_path = $this->config->item('image_path').'products/';
		$use_size 	= array('mini', 'default', 'medium', 'large'); //---- ใช้ทั้งหมด 4 ขนาด
    $image 	= new Upload($file);

    if( $image->uploaded )
    {
      foreach($use_size as $size)
      {
				$imagePath = $image_path.$size.'/'; //--- แต่ละ folder
        $img	= $this->getImageSizeProperties($size); //--- ได้ $img['prefix'] , $img['size'] กลับมา
        $image->file_new_name_body = $img['prefix'] . $img_name; 		//--- เปลี่ยนชือ่ไฟล์ตาม prefix + id_image
        $image->image_resize			 = TRUE;		//--- อนุญาติให้ปรับขนาด
        $image->image_retio_fill	 = TRUE;		//--- เติกสีให้เต็มขนาดหากรูปภาพไม่ได้สัดส่วน
        $image->file_overwrite		 = TRUE;		//--- เขียนทับไฟล์เดิมได้เลย
        $image->auto_create_dir		 = TRUE;		//--- สร้างโฟลเดอร์อัตโนมัติ กรณีที่ไม่มีโฟลเดอร์
        $image->image_x					   = $img['size'];		//--- ปรับขนาดแนวตั้ง
        $image->image_y					   = $img['size'];		//--- ปรับขนาดแนวนอน
        $image->image_background_color	= "#FFFFFF";		//---  เติมสีให้ตามี่กำหนดหากรูปภาพไม่ได้สัดส่วน
        $image->image_convert			= 'jpg';		//--- แปลงไฟล์

        $image->process($imagePath);						//--- ดำเนินการตามที่ได้ตั้งค่าไว้ข้างบน

				if( ! $image->processed )	//--- ถ้าไม่สำเร็จ
				{
					$sc = FALSE;
					$this->error = $image->error;
				}
      } //--- end foreach
    } //--- end if

    $image->clean();	//--- เคลียร์รูปภาพออกจากหน่วยความจำ

		return $sc;
	}


	public function getImageSizeProperties($size)
	{
		$sc = array();
		switch($size)
		{
			case "mini" :
			$sc['prefix']	= "product_mini_";
			$sc['size'] 	= 60;
			break;
			case "default" :
			$sc['prefix'] 	= "product_default_";
			$sc['size'] 	= 125;
			break;
			case "medium" :
			$sc['prefix'] 	= "product_medium_";
			$sc['size'] 	= 250;
			break;
			case "large" :
			$sc['prefix'] 	= "product_large_";
			$sc['size'] 	= 1500;
			break;
			default :
			$sc['prefix'] 	= "";
			$sc['size'] 	= 300;
			break;
		}//--- end switch
		return $sc;
	}


	public function delete_image($product_id)
	{
		$sc = TRUE;

		if(!empty($product_id))
		{
			if($rs)
			{
				delete_product_image($product_id);
			}
			else
			{
				$sc = FALSE;
				$this->error = "Delete image failed";
			}
		}
		else
		{
			$sc = FALSE;
			$this->error = "ไม่พบ id image";
		}

		$this->response($sc);
	}


  public function sync_data()
	{
		$sc = TRUE;
		$response = json_encode(array(
			array(
				'ItemCode' => "3673014376",
				"ItemName" => "โคมไฟติดลอย รุ่น SJ6371/6C",
				"CodeBars" => "",
				"SUoMEntry" => 1,
				"Price" => 4400,
				"Cost" => 1200,
				"U_Model" => 1,
				"U_Category" => "",
				"U_Type" => "",
				"U_Brand" => 1,
				"validFor" => "Y"
			),
			array(
				'ItemCode' => "3881010245",
				"ItemName" => "BEC โคมฉาย LED 100 วัตต์ แสงวอร์มไวท์ รุ่น ZONIC เดย์ไลท์ 50 วัตต์",
				"CodeBars" => "",
				"SUoMEntry" => 1,
				"Price" => 695,
				"Cost" => 200,
				"U_Model" => 2,
				"U_Category" => "",
				"U_Type" => "",
				"U_Brand" => 1,
				"validFor" => "Y"
			),
			array(
				'ItemCode' => "3881010445",
				"ItemName" => "BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K",
				"CodeBars" => "",
				"SUoMEntry" => 1,
				"Price" => 1500,
				"Cost" => 500,
				"U_Model" => 3,
				"U_Category" => "",
				"U_Type" => "",
				"U_Brand" => 1,
				"validFor" => "Y"
			),
			array(
				'ItemCode' => "SKU-00918",
				"ItemName" => "La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto",
				"CodeBars" => "",
				"SUoMEntry" => 2,
				"Price" => 51900,
				"Cost" => 45000,
				"U_Model" => 4,
				"U_Category" => "",
				"U_Type" => "",
				"U_Brand" => 7,
				"validFor" => "Y"
			)
		));

		$res = json_decode($response);


		if(! empty($res))
		{
			foreach($res as $rs)
			{
				if(isset($rs->ItemCode) && $rs->ItemCode != "" && isset($rs->ItemName) && $rs->ItemName != "")
				{
					$arr = array(
						"code" => $rs->ItemCode,
						"name" => $rs->ItemName,
						"barcode" => empty($rs->CodeBars) ? NULL : $rs->CodeBars,
						"unit_id" => empty($rs->SUoMEntry) ? NULL : $rs->SUoMEntry,
						"price" => empty($rs->Price) ? 0.00 : get_zero($rs->Price),
						"cost" => empty($rs->Cost) ? 0.00 : get_zero($rs->Cost),
						"model_id" => empty($rs->U_Model) ? NULL : $rs->U_Model,
						"category_id" => empty($rs->U_Category) ? NULL : $rs->U_Category,
						"brand_id" => empty($rs->U_Brand) ? NULL : $rs->U_Brand,
						"type_id" => empty($rs->U_Type) ? NULL : $rs->U_Type,
						"status" => empty($rs->validFor) ? 1 : ($rs->validFor == 'N' ? 0 : 1)
					);

					if( ! $this->products_model->is_exists($rs->ItemCode))
					{
						$this->products_model->add($arr);
					}
					else
					{
						$this->products_model->update($rs->ItemCode, $arr);
					}
				}
			}
		}

		$this->_response($sc);
	}


  public function clear_filter()
	{
    $filter = array('item_code','item_name','item_barcode','color', 'size','group','sub_group','category','kind','type','brand','year');
    clear_filter($filter);
	}
}

?>
