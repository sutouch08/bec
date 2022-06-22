<?php
class Customers_model extends CI_Model
{
	private $tb = "customers";

  public function __construct()
  {
    parent::__construct();
  }


	public function add(array $ds = array())
	{
		if(!empty($ds))
		{
			return $this->db->insert($this->tb, $ds);
		}

		return FALSE;
	}


	public function get($CardCode)
	{
		$rs = $this->db->where('CardCode', $CardCode)->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function get_by_id($id)
	{
		$rs = $this->db->where('id', $id)->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function get_name($CardCode)
	{
		$rs = $this->db->select('CardName')->where('CardCode', $CardCode)->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row()->CardName;
		}

		return NULL;
	}


	public function update($CardCode, array $ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->where('CardCode', $CardCode)->update($this->tb, $ds);
		}

		return FALSE;
	}



	public function update_by_id($id, array $ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->where('id', $id)->update($this->tb, $ds);
		}

		return FALSE;
	}


	public function count_rows(array $ds = array())
	{
		if( ! no_value($ds['code']))
		{
			$this->db->like('CardCode', $ds['code']);
		}

		if( ! no_value($ds['name']))
		{
			$this->db->like('CardName', $ds['name']);
		}

		if($ds['group'] != 'all')
		{
			$this->db->where('GroupCode', $ds['group']);
		}

		if($ds['type'] != 'all')
		{
			$this->db->where('TypeCode', $ds['type']);
		}

		if($ds['grade'] != 'all')
		{
			$this->db->where('GradeCode', $ds['grade']);
		}

		if($ds['region'] != 'all')
		{
			$this->db->where('RegionCode', $ds['region']);
		}

		if($ds['area'] != 'all')
		{
			$this->db->where('AreaCode', $ds['area']);
		}

		if($ds['term'] != 'all')
		{
			$this->db->where('GroupNum', $ds['term']);
		}

		if($ds['slp'] != 'all')
		{
			$this->db->where('SlpCode', $ds['slp']);
		}

		if($ds['status'] != 'all')
		{
			$this->db->where('Status', $ds['status']);
		}


		return $this->db->count_all_results($this->tb);
	}


	public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
	{
		$this->db
		->select('c.*')
		->select('cg.name AS group_name')
		->select('ty.name AS type_name')
		->select('gr.name AS grade_name')
		->select('rg.name AS region_name')
		->select('ar.name AS area_name')
		->select('tm.PymntGroup AS term_name')
		->select('slp.name AS sale_name')
		->from('customers AS c')
		->join('customer_group AS cg', 'c.GroupCode = cg.code', 'left')
		->join('customer_type AS ty', 'c.TypeCode = ty.id', 'left')
		->join('customer_grade AS gr', 'c.GradeCode = gr.id', 'left')
		->join('customer_region AS rg', 'c.RegionCode = rg.id', 'left')
		->join('customer_area AS ar', 'c.AreaCode = ar.id', 'left')
		->join('payment_term AS tm', 'c.GroupNum = tm.GroupNum', 'left')
		->join('sale_person AS slp', 'c.SlpCode = slp.id', 'left');

		if( ! no_value($ds['code']))
		{
			$this->db->like('CardCode', $ds['code']);
		}

		if( ! no_value($ds['name']))
		{
			$this->db->like('CardName', $ds['name']);
		}

		if($ds['group'] != 'all')
		{
			$this->db->where('GroupCode', $ds['group']);
		}

		if($ds['type'] != 'all')
		{
			$this->db->where('TypeCode', $ds['type']);
		}

		if($ds['grade'] != 'all')
		{
			$this->db->where('GradeCode', $ds['grade']);
		}

		if($ds['region'] != 'all')
		{
			$this->db->where('RegionCode', $ds['region']);
		}

		if($ds['area'] != 'all')
		{
			$this->db->where('AreaCode', $ds['area']);
		}

		if($ds['term'] != 'all')
		{
			$this->db->where('GroupNum', $ds['term']);
		}

		if($ds['slp'] != 'all')
		{
			$this->db->where('SlpCode', $ds['slp']);
		}

		if($ds['status'] != 'all')
		{
			$this->db->where('Status', $ds['status']);
		}

		$rs = $this->db->order_by('CardCode', 'ASC')->limit($perpage, $offset)->get();

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}

}
?>
