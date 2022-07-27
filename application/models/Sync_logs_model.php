<?php
class Sync_logs_model extends CI_Model
{

	public $logs;

	public function __construct()
	{
		parent::__construct();

		$this->logs = $this->load->database('logs', TRUE);
	}

	public function add_logs($ds = array())
	{
		if( ! empty($ds))
		{
			return $this->logs->insert('auto_sync_logs', $ds);
		}

		return FALSE;
	}

}


 ?>
