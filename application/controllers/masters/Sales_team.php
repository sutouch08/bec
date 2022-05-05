<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_team extends PS_Controller{
	public $menu_code = 'USTEAM'; //--- Add/Edit Profile
	public $menu_group_code = 'SC'; //--- System security
	public $title = 'Customer Team';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/sales_team';
		$this->load->model('masters/sale_team_model');
  }




  public function index()
  {
		$filter = array(
			'code' => get_filter('code', 'st_code', ''),
			'name' => get_filter('name', 'st_name', '')
		);

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);

		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->sale_team_model->count_rows($filter);

		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);

		$rs = $this->sale_team_model->get_list($filter, $perpage, $this->uri->segment($segment));

		$filter['data'] = $rs;

		$this->pagination->initialize($init);
		
    $this->load->view('masters/sale_team/team_list', $filter);
  }




  public function add_new()
  {
		$this->title = "Add Team";
    $this->load->view('masters/sale_team/team_add');
  }


	public function edit($id)
	{
		$this->title = "Edit Team";
		$ds = $this->sale_team_model->get($id);

		$this->load->view('masters/sale_team/team_edit', $ds);
	}


	public function clear_filter()
	{
		return clear_filter(array('st_code', 'st_name'));
	}
}
?>
