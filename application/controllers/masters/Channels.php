<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channels extends PS_Controller
{
  public $menu_code = 'DBCHAN';
	public $menu_group_code = 'DB';
	public $title = 'Sale Channels';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/channels';
    $this->load->model('masters/channels_model');
  }


  public function index()
  {
		$code = get_filter('code', 'channels_code', '');
		$name = get_filter('name', 'channels_name', '');

		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_filter('set_rows', 'rows', 20);
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = get_filter('rows', 'rows', 300);
		}

		$segment = 4; //-- url segment
		$rows = $this->channels_model->count_rows($code, $name);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	= pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$rs = $this->channels_model->get_data($code, $name, $perpage, $this->uri->segment($segment));

    $ds = array(
      'code' => $code,
      'name' => $name,
			'data' => $rs
    );

		$this->pagination->initialize($init);
    $this->load->view('masters/channels/channels_view', $ds);
  }


  public function add_new()
  {
    $this->title = "Add Channels";
    $this->load->view('masters/channels/channels_add_view');
  }



  public function edit($code)
  {
		$this->title = "Edit Channels";
    $data['data'] = $this->channels_model->get_channels($code);
    $this->load->view('masters/channels/channels_edit_view', $data);
  }



  public function clear_filter()
	{
		return clear_filter(array('channels_code', 'channels_name'));  
	}

}//--- end class
 ?>
