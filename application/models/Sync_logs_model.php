<?php
class Sync_logs_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add_logs($ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->insert('sync_logs', $ds);
		}

		return FALSE;
	}


	public function add_error_logs($ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->insert('sync_error_logs', $ds);
		}
	}

	
}


 ?>
