<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends PS_Controller
{
  public $menu_code = 'SOODSQ';
	public $menu_group_code = 'SO';
  public $menu_sub_group_code = 'ORDER';
	public $title = 'Quotations';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'orders/quotation';
  }


  public function index()
  {
		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = 20;
		}

		$segment  = 4; //-- url segment
		$rows     = 200; //$this->orders_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	    = pagination_config($this->home.'/index/', $rows, $perpage, $segment);
    $offset   = $rows < $this->uri->segment($segment) ? NULL : $this->uri->segment($segment);
		$this->pagination->initialize($init);
    $this->load->view('quotation/quotation_list');
  }


  public function add_new()
  {
    $this->load->view('quotation/quotation_add');
  }



  public function edit_detail()
  {
		$this->load->view('quotation/quotation_edit_detail');
  }


	public function view_detail($status = NULL)
	{
		$ds['status'] = $status;
		$this->load->view('quotation/quotation_view_detail', $ds);
	}


}
?>
