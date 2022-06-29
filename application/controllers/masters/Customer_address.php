<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_address extends PS_Controller
{
  public $menu_code = 'DBCADR';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customer Address';
	public $segment = 4;

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customer_address';
    $this->load->model('masters/customer_address_model');
  }


  public function index()
  {
    $filter = array(
      "address" => get_filter('address', 'ad_address', ''),
			"customer" => get_filter('customer', 'ad_customer', ''),
			"type" => get_filter('type', 'ad_type', 'all')
    );

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();


		$rows = $this->customer_address_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);
		$filter['data'] = $this->customer_address_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$this->pagination->initialize($init);
    $this->load->view('masters/customer_address/customer_address_list', $filter);
  }


  public function edit($id)
  {
    $data = $this->customer_address_model->get($id);
    $this->load->view('masters/customer_address/customer_address_edit', $data);
  }



	public function update()
	{
		$sc = TRUE;

		$id = $this->input->post('id');
		$name = trim($this->input->post('name'));

		if($this->customer_address_model->is_exists($name, $id))
		{
			$sc = FALSE;
			set_error('exists', $name);
		}
		else
		{
			$arr = array(
				'name' => $name
			);

			if( ! $this->customer_address_model->update($id, $arr))
			{
				$sc = FALSE;
				set_error('update');
			}
		}

		//--- send update to SAP
		$this->update_sap($id, $name);

		$this->_response($sc);
	}



	public function sync_data()
	{
		$sc = TRUE;

		$response = json_encode(array(
			array(
				'Address' => '0000',
				'CardCode' => 'CL-001',
				'AdresType' => 'B',
				'Address2' => '0000',
				'Address3' => 'สำนักงานใหญ่',
				'StreetNo' => '',
				'Street' => 'เลขที่ 445/3 ถ.เพชรบุรี',
				'Block' => 'แขวงทุ่งพญาไท',
				'City' => 'เขตราชเทวี',
				'County' => 'กรุงเทพมหานคร',
				'Country' => 'TH',
				'State' => NULL,
				'ZipCode' => '10400'
			),
			array(
				'Address' => '0000',
				'CardCode' => 'CL-001',
				'AdresType' => 'S',
				'Address2' => '0000',
				'Address3' => 'สำนักงานใหญ่',
				'StreetNo' => '',
				'Street' => 'เลขที่ 445/3 ถ.เพชรบุรี',
				'Block' => 'แขวงทุ่งพญาไท',
				'City' => 'เขตราชเทวี',
				'County' => 'กรุงเทพมหานคร',
				'Country' => 'TH',
				'State' => NULL,
				'ZipCode' => '10400'
			),
			array(
				'Address' => '0000',
				'CardCode' => 'CL-002',
				'AdresType' => 'B',
				'Address2' => '0000',
				'Address3' => 'สำนักงานใหญ่',
				'StreetNo' => '',
				'Street' => 'เลขที่ 445/2 ถ.เพชรบุรี',
				'Block' => 'แขวงทุ่งพญาไท',
				'City' => 'เขตราชเทวี',
				'County' => 'กรุงเทพมหานคร',
				'Country' => 'TH',
				'State' => NULL,
				'ZipCode' => '10400'
			),
			array(
				'Address' => '0000',
				'CardCode' => 'CL-002',
				'AdresType' => 'S',
				'Address2' => '0000',
				'Address3' => 'สำนักงานใหญ่',
				'StreetNo' => '',
				'Street' => 'เลขที่ 445/2 ถ.เพชรบุรี',
				'Block' => 'แขวงทุ่งพญาไท',
				'City' => 'เขตราชเทวี',
				'County' => 'กรุงเทพมหานคร',
				'Country' => 'TH',
				'State' => NULL,
				'ZipCode' => '10400'
			),
			array(
				'Address' => '0001',
				'CardCode' => 'CL-001',
				'AdresType' => 'S',
				'Address2' => '0001',
				'Address3' => 'สีลม',
				'StreetNo' => '',
				'Street' => 'เลขที่ 445/3 ถ.เพชรบุรี',
				'Block' => 'แขวงทุ่งพญาไท',
				'City' => 'เขตราชเทวี',
				'County' => 'กรุงเทพมหานคร',
				'Country' => 'TH',
				'State' => NULL,
				'ZipCode' => '10400'
			)
		));



		$res = json_decode($response);


		if(! empty($res))
		{
			foreach($res as $rs)
			{
				$cr = $this->customer_address_model->get($rs->CardCode, $rs->AdresType, $rs->Address);

				if(empty($cr))
				{
					$arr = array(
						'Address' => $rs->Address,
						'CardCode' => $rs->CardCode,
						'AdresType' => $rs->AdresType,
						'Address2' => $rs->Address2,
						'Address3' => $rs->Address3,
						'StreetNo' => $rs->StreetNo,
						'Street' => $rs->Street,
						'Block' => $rs->Block,
						'City' => $rs->City,
						'County' => $rs->County,
						'Country' => $rs->Country,
						'State' => $rs->State,
						'ZipCode' => $rs->ZipCode
					);

					$this->customer_address_model->add($arr);
				}
				else
				{
					$arr = array(
						'Address' => $rs->Address,
						'CardCode' => $rs->CardCode,
						'AdresType' => $rs->AdresType,
						'Address2' => $rs->Address2,
						'Address3' => $rs->Address3,
						'StreetNo' => $rs->StreetNo,
						'Street' => $rs->Street,
						'Block' => $rs->Block,
						'City' => $rs->City,
						'County' => $rs->County,
						'Country' => $rs->Country,
						'State' => $rs->State,
						'ZipCode' => $rs->ZipCode
					);

					$this->customer_address_model->update($cr->id, $arr);
				}
			}
		}

		$this->_response($sc);
	}



	private function update_sap($id, $name)
	{
		return TRUE;
	}


  public function clear_filter()
	{
		$filter = array(
      "ad_address",
			"ad_customer",
			"ad_type"
    );

		clear_filter($filter);

		echo "done";
	}

}//--- end class
 ?>
