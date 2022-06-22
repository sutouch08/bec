<?php
class Products_model extends CI_Model
{
	private $tb = "products";

  public function __construct()
  {
    parent::__construct();
  }


	public function get_all()
	{
		$rs = $this->db->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}

	public function get($code)
	{
		$this->db
		->select('pd.*')
		->select('pm.name AS model')
		->select('pc.name AS category')
		->select('pt.name AS type')
		->select('pb.name AS brand')
		->select('u.name AS uom')
		->from('products AS pd')
		->join('product_model AS pm', 'pd.model_id = pm.id', 'left')
		->join('product_category AS pc', 'pd.category_id = pc.id', 'left')
		->join('product_type AS pt', 'pd.type_id = pt.id', 'left')
		->join('product_brand AS pb', 'pd.brand_id = pb.id', 'left')
		->join('uom AS u', 'pd.uom_id = u.id', 'left');

		$rs = $this->db->where('pd.code', $code)->get();

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function get_by_id($id)
	{
		$this->db
		->select('pd.*')
		->select('pm.name AS model')
		->select('pc.name AS category')
		->select('pt.name AS type')
		->select('pb.name AS brand')
		->select('u.name AS uom')
		->from('products AS pd')
		->join('product_model AS pm', 'pd.model_id = pm.id', 'left')
		->join('product_category AS pc', 'pd.category_id = pc.id', 'left')
		->join('product_type AS pt', 'pd.type_id = pt.id', 'left')
		->join('product_brand AS pb', 'pd.brand_id = pb.id', 'left')
		->join('uom AS u', 'pd.uom_id = u.id', 'left');

		$rs = $this->db->where('pd.id', $id)->get();

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function add(array $ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->insert($this->tb, $ds);
		}

		return FALSE;
	}


	public function update($code, array $ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->where('code', $code)->update($this->tb, $ds);
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



	public function is_exists($code)
	{
		$count = $this->db->where('code', $code)->count_all_results($this->tb);

		if($count > 0)
		{
			return TRUE;
		}

		return FALSE;
	}


	public function count_rows(array $ds = array())
	{
		if(isset($ds['code']) && $ds['code'] != "")
		{
			$this->db->like('code', $ds['code']);
		}

		if(isset($ds['name']) && $ds['name'] != "")
		{
			$this->db->like('name', $ds['name']);
		}

		if(isset($ds['model']) && $ds['model'] != "")
		{
			$this->db->where_in('model_id', model_in($ds['model']));
		}

		if(isset($ds['category']) && $ds['category'] != 'all')
		{
			$this->db->where('category_id', $ds['category']);
		}

		if(isset($ds['type']) && $ds['type'] != 'all')
		{
			$this->db->where('type_id', $ds['type']);
		}

		if(isset($ds['brand']) && $ds['brand'] != 'all')
		{
			$this->db->where('brand_id', $ds['brand']);
		}

		if(isset($ds['status']) && $ds['status'] != 'all')
		{
			$this->db->where('status', $ds['status']);
		}

		return $this->db->count_all_results($this->tb);
	}


	public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
	{
		$this->db
		->select('pd.*')
		->select('pm.name AS model_name')
		->select('pg.name AS category_name')
		->select('pt.name AS type_name')
		->select('pb.name AS brand_name')
		->from('products AS pd')
		->join('product_model AS pm', 'pd.model_id = pm.id', 'left')
		->join('product_category AS pg', 'pd.category_id = pg.id', 'left')
		->join('product_type AS pt', 'pd.type_id = pt.id', 'left')
		->join('product_brand AS pb', 'pd.brand_id = pb.id', 'left');

		if(isset($ds['code']) && $ds['code'] != "")
		{
			$this->db->like('code', $ds['code']);
		}

		if(isset($ds['name']) && $ds['name'] != "")
		{
			$this->db->like('name', $ds['name']);
		}

		if(isset($ds['model']) && $ds['model'] != "")
		{
			$this->db->where_in('model_id', model_in($ds['model']));
		}

		if(isset($ds['category']) && $ds['category'] != 'all')
		{
			$this->db->where('category_id', $ds['category']);
		}

		if(isset($ds['type']) && $ds['type'] != 'all')
		{
			$this->db->where('type_id', $ds['type']);
		}

		if(isset($ds['brand']) && $ds['brand'] != 'all')
		{
			$this->db->where('brand_id', $ds['brand']);
		}

		if(isset($ds['status']) && $ds['status'] != 'all')
		{
			$this->db->where('status', $ds['status']);
		}

		$rs = $this->db->limit($perpage, $offset)->get();

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function get_cover($model_id = NULL)
	{
		$rs = $this->db
		->select('id')
		->where('model_id', $model_id)
		->order_by('is_cover', 'DESC')
		->limit(1)
		->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row()->id;
		}

		return NULL;
	}



}
?>
