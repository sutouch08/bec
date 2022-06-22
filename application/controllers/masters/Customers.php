<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends PS_Controller
{
  public $menu_code = 'DBCUST';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customers';
	public $segment = 4;


  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customers';
		$this->load->model('masters/customers_model');
		$this->load->helper('customer');
  }


  public function index()
  {
		$filter = array(
			'code' => get_filter('code', 'cs_code', ''),
			'name' => get_filter('name', 'cs_name', ''),
			'group' => get_filter('group', 'cs_group', 'all'),
			'type' => get_filter('type', 'cs_type', 'all'),
			'grade' => get_filter('grade', 'cs_grade', 'all'),
			'region' => get_filter('region', 'cs_region', 'all'),
			'area' => get_filter('area', 'cs_area', 'all'),
			'term' => get_filter('term', 'cs_term', 'all'),
			'slp' => get_filter('slp', 'cs_slp', 'all'),
			'status' => get_filter('status', 'cs_status', 'all')
		);


		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300

		$rows = $this->customers_model->count_rows($filter);

		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	    = pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->customers_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$this->pagination->initialize($init);
    $this->load->view('masters/customers/customers_list', $filter);
  }



  public function edit($id)
  {
		$this->load->model('masters/sales_person_model');
		$this->load->model('masters/customer_group_model');
		$this->load->model('masters/payment_term_model');


		$ds = $this->customers_model->get_by_id($id);

		if(! empty($ds))
		{
			$ds->sale_name = $this->sales_person_model->get_name($ds->SlpCode);
			$ds->term_name = $this->payment_term_model->get_name($ds->GroupNum);
			$ds->group_name = $this->customer_group_model->get_name($ds->GroupCode);
		}
		else
		{
			$ds->sale_name = NULL;
			$ds->term_name = NULL;
			$ds->group_name = NULL;
		}

		$this->load->view('masters/customers/customers_edit', $ds);
  }



	public function update()
	{
		$sc = TRUE;
		$id  = $this->input->post('id');
		$TypeCode = get_null($this->input->post('TypeCode'));
		$GradeCode = get_null($this->input->post('GradeCode'));
		$RegionCode = get_null($this->input->post('RegionCode'));
		$AreaCode = get_null($this->input->post('AreaCode'));

		$arr = array(
			'TypeCode' => $TypeCode,
			'GradeCode' => $GradeCode,
			'RegionCode' => $RegionCode,
			'AreaCode' => $AreaCode
		);

		if( ! $this->customers_model->update_by_id($id, $arr))
		{
			$sc = FALSE;
			set_error('update');
		}

		$this->_response($sc);
	}


  public function clear_filter()
	{
		$filter = array('cs_code', 'cs_name', 'cs_group', 'cs_type', 'cs_grade', 'cs_region', 'cs_area', 'cs_term', 'cs_slp', 'cs_status');
    clear_filter($filter);
	}

} //---

?>
