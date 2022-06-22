<?php
class Warehouse extends PS_Controller
{
	public $menu_code = 'DBOWHS';
	public $menu_group_code = 'DB';
	public $title = 'Warehouse';
	public $segment = 4;

	public function __construct()
	{
		parent::__construct();
		$this->home = base_url().'masters/warehouse';
		$this->load->model('masters/warehouse_model');
	}


	public function index()
	{
		$filter = array(
			'code' => get_filter('code', 'whs_code', ''),
			'name' => get_filter('name', 'whs_name', '')
		);

		$perpage = get_rows();

		$rows = $this->warehouse_model->count_rows($filter);

		$filter['data'] = $this->warehouse_model->get_list($filter, $perpage, $this->uri->segment($this->segment));

		$init = pagination_config($this->home.'/index/', $rows, $perpage, $this->segment);

		$this->pagination->initialize($init);

		$this->load->view('masters/warehouse/warehouse_list', $filter);
	}


	public function sync_data()
	{
		$sc = TRUE;

		$response = json_encode(array(
			array("WhsCode" => "AFG-0000", "WhsName" =>"Main warehouse"),
			array("WhsCode" => "AFG-0001", "WhsName" =>"Branch 1 warehouse"),
			array("WhsCode" => "AFG-0002", "WhsName" =>"Branch 2 warehouse"),
			array("WhsCode" => "AFG-0003", "WhsName" =>"Branch 3 warehouse")
		));

		$res = json_decode($response);

		if( ! empty($res))
		{
			foreach($res as $rs)
			{
				$whs = $this->warehouse_model->get($rs->WhsCode);

				if(empty($whs))
				{
					$arr = array(
						"code" => $rs->WhsCode,
						"name" => $rs->WhsName,
						"last_sync" => now()
					);

					$this->warehouse_model->add($arr);
				}
				else
				{
					$arr = array(
						"name" => $rs->WhsName,
						"last_sync" => now()
					);

					$this->warehouse_model->update($rs->WhsCode, $arr);
				}
			}
		}

		$this->_response($sc);
	}


	public function clear_filter()
	{
		return clear_filter(array("whs_code", "whs_name"));
	}


} //-- end class
 ?>
