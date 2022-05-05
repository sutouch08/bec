<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category extends PS_Controller
{
  public $menu_code = 'DBPDCR';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'PRODUCT';
	public $title = 'Product Category';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/product_category';
    $this->load->model('masters/product_category_model');
  }


  public function index()
  {
		$code = "";
		$name = "";
		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300

		$segment = 4; //-- url segment
		$rows = $this->product_category_model->count_rows($code, $name);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$data = $this->product_category_model->get_data($code, $name, $perpage, $this->uri->segment($segment));

    $ds = array(
			'data' => $data
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/product_category/product_category_view', $ds);
  }


  public function add_new()
  {
    $this->title = 'Add Category';
    $this->load->view('masters/product_category/product_category_add_view');
  }



  public function edit($code)
  {
    $this->title = 'Edit Category';
    $data = $this->product_category_model->get($code);

    $this->load->view('masters/product_category/product_category_edit_view', $data);
  }



  public function update()
  {
    $sc = TRUE;

    if($this->input->post('code'))
    {
      $old_code = $this->input->post('product_category_code');
      $old_name = $this->input->post('product_category_name');
      $code = $this->input->post('code');
      $name = $this->input->post('name');

      $ds = array(
        'code' => $code,
        'name' => $name,
        'old_code' => $old_code
      );

      if($sc === TRUE && $this->product_category_model->is_exists($code, $old_code) === TRUE)
      {
        $sc = FALSE;
        set_error("'".$code."' มีอยู่ในระบบแล้ว โปรดใช้รหัสอื่น");
      }

      if($sc === TRUE && $this->product_category_model->is_exists_name($name, $old_name) === TRUE)
      {
        $sc = FALSE;
        set_error("'".$name."' มีอยู่ในระบบแล้ว โปรดใช้ชื่ออื่น");
      }

      if($sc === TRUE)
      {
        if($this->product_category_model->update($old_code, $ds) === TRUE)
        {
          $this->export_to_sap($code, $old_code);

          set_message('ปรับปรุงข้อมูลเรียบร้อยแล้ว');
        }
        else
        {
          $sc = FALSE;
          set_error('ปรับปรุงข้อมูลไม่สำเร็จ');
        }
      }

    }
    else
    {
      $sc = FALSE;
      set_error('ไม่พบข้อมูล');
    }

    if($sc === FALSE)
    {
      $code = $this->input->post('product_category_code');
    }

    redirect($this->home.'/edit/'.$code);
  }



  public function delete($code)
  {
    if($code != '')
    {
      if($this->product_category_model->delete($code))
      {
        set_message('ลบข้อมูลเรียบร้อยแล้ว');
      }
      else
      {
        set_error('ลบข้อมูลไม่สำเร็จ');
      }
    }
    else
    {
      set_error('ไม่พบข้อมูล');
    }

    redirect($this->home);
  }



  public function export_to_sap($code, $old_code)
  {
    $rs = $this->product_category_model->get($code);
    if(!empty($rs))
    {
      $ext = $this->product_category_model->is_sap_exists($old_code);

      $arr = array(
        'Code' => $rs->code,
        'Name' => $rs->name,
        'UpdateDate' => sap_date(now(), TRUE)
      );

      if($ext)
      {
        $arr['Flag'] = 'U';
        if($code !== $old_code)
        {
          $arr['OLDCODE'] = $old_code;
        }

        //return $this->product_category_model->update_sap_cate($old_code, $arr);
      }
      else
      {
        $arr['Flag'] = 'A';

        //return $this->product_category_model->add_sap_cate($arr);
      }

      return $this->product_category_model->add_sap_cate($arr);
    }

    return FALSE;
  }



  public function clear_filter()
	{
		$filter = array('code', 'name');
    clear_filter($filter);
	}

}//--- end class
 ?>
