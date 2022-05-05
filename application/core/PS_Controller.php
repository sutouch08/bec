<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PS_Controller extends CI_Controller
{
  public $pm;
  public $home;
	public $_user;
	public $_SuperAdmin = FALSE;

  public function __construct()
  {
    parent::__construct();


    //--- check is user has logged in ?
    _check_login();

    $uid = get_cookie('uid');

		$this->_user = $this->user_model->get_user_by_uid($uid);


    //--- get permission for user
    $this->pm = get_permission($this->menu_code, $uid, get_cookie('id_profile'));

  }


  public function deny_page()
  {
    return $this->load->view('deny_page');
  }


  public function error_page($err = NULL)
  {
		$error = array('error_message' => $err);
    return $this->load->view('page_error', $error);
  }

	public function page_error($err = NULL)
  {
		$error = array('error_message' => $err);
    return $this->load->view('page_error', $error);
  }
}

?>
