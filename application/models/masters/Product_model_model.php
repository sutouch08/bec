<?php
class Product_model_model extends CI_Model
{
	public $tb = "product_model";

	public function __construct()
	{
		parent::__construct();
	}


	public function get($code)
	{
		$rs = $this->db->where('code', $code)->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}

	public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
	{
		if(!empty($ds['code']))
		{
			$this->db->like('code', $ds['code']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('name', $ds['name']);
		}

		$rs = $this->db->order_by('code', 'DESC')->limit($perpage, $offset)->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function count_rows(array $ds = array())
	{
		if(!empty($ds['code']))
		{
			$this->db->like('code', $ds['code']);
		}

		if(!empty($ds['name']))
		{
			$this->db->like('name', $ds['name']);
		}

	return $this->db->count_all_results($this->tb);
	}
} //--- end class
?>
