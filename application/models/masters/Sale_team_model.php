<?php
class Sale_team_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }


	public function get($id)
	{
		$rs = $this->db->where('id', $id)->get('sale_team');

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
			return $this->db->insert('sale_taam', $ds);
		}

		return FALSE;
	}


	public function update($id , array $ds = array())
	{
		if(!empty($ds))
		{
			return $this->db->where('id', $id)->update('sale_team', $ds);
		}

		return FALSE;
	}


	public function delete($id)
	{
		return $this->db->where('id', $id)->delete('sale_team');
	}


	public function count_rows(array $ds = array())
	{
		$this->db->where('id >', 0, FALSE);
		
		if(!empty($ds['code']))
		{
			$this->db->like('code', $ds['code']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('name', $ds['name']);
		}

		return $this->db->count_all_results('sale_team');
	}


  public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
	{
		$this->db->where('id >', 0, FALSE);

		if(!empty($ds['code']))
		{
			$this->db->like('code', $ds['code']);
		}


		if(!empty($ds['name']))
		{
			$this->db->like('name', $ds['name']);
		}

		$rs = $this->db->limit($perpage, $offset)->get('sale_team');

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}

} //--- End class


 ?>
