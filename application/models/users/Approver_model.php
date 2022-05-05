<?php
class Approver_model extends CI_Model
{
	public $tb = "approver";

	public function __construct()
	{
		parent::__construct();
	}


	public function get($id)
	{
		$rs = $this->db->where('id', $id)->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function add(array $ds = array())
	{
		if(!empty($ds))
		{
			return $this->db->insert($this->tb, $ds);
		}

		return FALSE;
	}


	public function update($id, array $ds = array())
	{
		if(!empty($ds))
		{
			return $this->db->where('id', $id)->update($this->tb, $ds);
		}

		return FALSE;
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete($this->tb);
	}


	public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
	{
		$this->db
		->select('approver.*, sale_team.name AS team_name')
		->from('approver')
		->join('sale_team', 'approver.team = sale_team.id', 'left');

		if(!empty($ds['uname']))
		{
			$this->db->like('approve.uname', $ds['uname']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('approver.name', $ds['name']);
		}

		if(isset($ds['team']) && $ds['team'] !== 'all')
		{
			$this->db->where('approver.team', $ds['team']);
		}

		if(isset($ds['status']) && $ds['status'] !== 'all')
		{
			$this->db->where('approver.status', $ds['status']);
		}

		$rs = $this->db->order_by('approver.uname', 'ASC')->limit($perpage, $offset)->get();

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function count_rows(array $ds = array())
	{
		if(!empty($ds['uname']))
		{
			$this->db->like('uname', $ds['uname']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('name', $ds['name']);
		}

		if(isset($ds['team']) && $ds['team'] !== 'all')
		{
			$this->db->where('team', $ds['team']);
		}

		if(isset($ds['status']) && $ds['status'] !== 'all')
		{
			$this->db->where('status', $ds['status']);
		}

		return $this->db->count_all_results($this->tb);
	}


} //--- end class

 ?>
