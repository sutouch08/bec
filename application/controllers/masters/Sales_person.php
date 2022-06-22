<?php
class Sales_person extends PS_Controller
{
	public $menu_code = 'DBSAPS';
	public $menu_group_code = 'DB';
	public $title = 'Sales Employee';
	public $segment = 4;

	public function __construct()
	{
		parent::__construct();
		$this->home = base_url().'masters/sales_person';
		$this->load->model('masters/sales_person_model');
	}


	public function index()
	{
		$filter = array(
			'name' => get_filter('name', 'slp_name', ''),
			'active' => get_filter('active', 'slp_active', 'all')
		);

		$perpage = get_rows();

		$rows = $this->sales_person_model->count_rows($filter);

		$filter['data'] = $this->sales_person_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$init = pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);

		$this->pagination->initialize($init);

		$this->load->view('masters/sales_person/sales_person_list', $filter);
	}


	public function sync_data()
	{
		$sc = TRUE;

		$response = json_encode(array(
			array("SlpCode" => -1, "SlpName" =>"-No Sales Employee-", "EmpID" => NULL, "Active" => "Y"),
			array("SlpCode" => 1, "SlpName" =>"คุณธิษตยา ม่วงโสภา", "EmpID" => 1, "Active" => "Y"),
			array("SlpCode" => 2, "SlpName" =>"คคุณขวัญจิรา ทะบันหาร", "EmpID" => 2, "Active" => "Y"),
			array("SlpCode" => 3, "SlpName" =>"นายจักรกฤช อังคณาสวรรค์", "EmpID" => 3, "Active" => "Y"),
			array("SlpCode" => 4, "SlpName" =>"คอัชรี จักรเพ็ชร", "EmpID" => NULL, "Active" => "N"),
			array("SlpCode" => 5, "SlpName" =>"คุณลลิตา แซ่ล้อ", "EmpID" => NULL, "Active" => "Y"),
			array("SlpCode" => 6, "SlpName" =>"วิภารัตน์ คดีพิศาล", "EmpID" => NULL, "Active" => "N"),
			array("SlpCode" => 7, "SlpName" =>"Shopee", "EmpID" => NULL, "Active" => "Y"),
		));

		$res = json_decode($response);

		if( ! empty($res))
		{
			foreach($res as $rs)
			{
				$slp = $this->sales_person_model->get($rs->SlpCode);

				if(empty($slp))
				{
					$arr = array(
						"id" => $rs->SlpCode,
						"name" => $rs->SlpName,
						"emp_id" => $rs->EmpID,
						"active" => $rs->Active === 'Y' ? 1 : 0
					);

					$this->sales_person_model->add($arr);
				}
				else
				{
					$arr = array(
						"name" => $rs->SlpName,
						"emp_id" => $rs->EmpID,
						"active" => $rs->Active === 'Y' ? 1 : 0
					);

					$this->sales_person_model->update($slp->id, $arr);
				}
			}
		}

		$this->_response($sc);
	}


	public function clear_filter()
	{
		return clear_filter(array("slp_name", "slp_active"));
	}


} //-- end class
 ?>
