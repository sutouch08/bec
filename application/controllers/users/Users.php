<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends PS_Controller{
	public $menu_code = 'SCUSER'; //--- Add/Edit Users
	public $menu_group_code = 'SC'; //--- System security
	public $title = 'Users';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'users/users';
  }



  public function index()
  {
		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		$segment = 4; //-- url segment
		$rows = 6;

		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);

		$this->pagination->initialize($init);
    $this->load->view('users/users_view');
  }





  public function add_user()
  {
		$this->title = "Add user";
    $this->load->view('users/user_add_view');
  }


	public function edit_user($code)
	{
		$this->title = "Edit user";		
		$data = array(
			'admin' => array('code' => 'admin', 'name' => 'ผู้ดูแลระบบ', 'sale' => '', 'team' => '', 'group' => 'BEC', 'activ' => 1, 'profile' => 1),
			'CUST01' => array('code' => 'CUST01', 'name' => 'ร้าน เฟอร์นิเจอร์', 'sale' => 'มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'Customer', 'activ' => 1, 'profile' => 0),
			'USER01' => array('code' => 'USER01', 'name' => 'มานี มีน้ำใจ', 'sale' => 'นางสาว มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
			'USER02' => array('code' => 'USER02', 'name' => 'มานะ บากบั่น', 'sale' => 'นาย มานะ บากบั่น', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
			'USER03' => array('code' => 'USER03', 'name' => 'Somai', 'sale' => 'นาย สมหมาย ดั่งใจหวัง', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
			'USER04' => array('code' => 'USER04', 'name' => 'มานี มีน้ำใจ์', 'sale' => 'นาย สมชาย สุดหล่อ', 'team' => 'Customer Team 3', 'group' => 'BEC', 'activ' => 1, 'profile' => 3)
		);

		$ds['data'] = (object) $data[$code];
		$this->load->view('users/user_edit_view', $ds);
	}


	public function reset_password($code)
	{
			$this->title = 'Reset Password';
			$data = array(
				'admin' => array('code' => 'admin', 'name' => 'ผู้ดูแลระบบ', 'sale' => '', 'team' => '', 'group' => 'BEC', 'activ' => 1, 'profile' => 1),
				'CUST01' => array('code' => 'CUST01', 'name' => 'ร้าน เฟอร์นิเจอร์', 'sale' => 'มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'Customer', 'activ' => 1, 'profile' => 0),
				'USER01' => array('code' => 'USER01', 'name' => 'มานี มีน้ำใจ', 'sale' => 'นางสาว มานี มีน้ำใจ', 'team' => 'Customer Team 1', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
				'USER02' => array('code' => 'USER02', 'name' => 'มานะ บากบั่น', 'sale' => 'นาย มานะ บากบั่น', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
				'USER03' => array('code' => 'USER03', 'name' => 'Somai', 'sale' => 'นาย สมหมาย ดั่งใจหวัง', 'team' => 'Customer Team 2', 'group' => 'BEC', 'activ' => 1, 'profile' => 3),
				'USER04' => array('code' => 'USER04', 'name' => 'มานี มีน้ำใจ์', 'sale' => 'นาย สมชาย สุดหล่อ', 'team' => 'Customer Team 3', 'group' => 'BEC', 'activ' => 1, 'profile' => 3)
			);
			$data['data'] = (object) $data[$code];
			$this->load->view('users/user_reset_pwd_view', $data);
	}


	public function clear_filter()
	{
		$filter = array('user', 'dname', 'profile');
		clear_filter($filter);
		echo 'done';
	}

}//--- end class


 ?>
