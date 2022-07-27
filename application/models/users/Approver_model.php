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
		->select('a.*, u.uname, u.name, t.name AS team_name')
		->from('approver AS a')
		->join('user AS u', 'a.user_id = u.id', 'left')
		->join('sale_team AS t', 'a.team_id = t.id', 'left');

		if(!empty($ds['uname']))
		{
			$this->db->like('u.uname', $ds['uname']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('u.name', $ds['name']);
		}

		if(isset($ds['team']) && $ds['team'] !== 'all')
		{
			$this->db->where('a.team_id', $ds['team']);
		}

		if(isset($ds['status']) && $ds['status'] !== 'all')
		{
			$this->db->where('a.status', $ds['status']);
		}

		$rs = $this->db->order_by('u.uname', 'ASC')->limit($perpage, $offset)->get();

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function count_rows(array $ds = array())
	{
		$this->db
		->from('approver AS a')
		->join('user AS u', 'a.user_id = u.id', 'left')
		->join('sale_team AS t', 'a.team_id = t.id', 'left');

		if(!empty($ds['uname']))
		{
			$this->db->like('u.uname', $ds['uname']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('u.name', $ds['name']);
		}

		if(isset($ds['team']) && $ds['team'] !== 'all')
		{
			$this->db->where('a.team_id', $ds['team']);
		}

		if(isset($ds['status']) && $ds['status'] !== 'all')
		{
			$this->db->where('a.status', $ds['status']);
		}

		return $this->db->count_all_results();
	}



	public function is_exists_data($user_id, $team_id, $disc, $id = NULL)
	{
		if( ! empty($id))
		{
			$this->db->where('id !=', $id);
		}

		$rs = $this->db
		->where('user_id', $user_id)
		->where('team_id', $team_id)
		->where('max_disc', $disc)
		->count_all_results($this->tb);

		if($rs > 0)
		{
			return TRUE;
		}

		return FALSE;
	}



	public function get_approve_right($user_id, $team_id)
	{
		$rs = $this->db
		->where('status', 1)
		->where('user_id', $user_id)
		->group_start()
		->where('team_id', $team_id)
		->or_where('team_id', -1)
		->group_end()
		->order_by('max_disc', 'DESC')
		->get('approver');

		if($rs->num_rows() > 0)
		{
			return $rs->row();
		}

		return NULL;
	}

} //--- end class

 ?>
