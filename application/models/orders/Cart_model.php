<?php
class Cart_model extends CI_Model
{
	private $tb = "order_cart";

	public function __construct()
	{
		parent::__construct();
	}

	public function get_customer_cart($CardCode)
	{
		$rs = $this->db->where('CardCode', $CardCode)->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function get_cart_total($CardCode)
	{
		$rs = $this->db
		->select('sale_team, WhsCode, QuotaNo, VatGroup, VatRate')
		->select_sum('LineTotal')
		->select_sum('totalVatAmount')
		->where('CardCode', $CardCode)
		->group_by('CardCode')
		->get($this->tb);

		if($rs->num_rows() === 1)
		{
			return $rs->row();
		}

		return NULL;
	}



	public function add($ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->insert($this->tb, $ds);
		}

		return FALSE;
	}


	public function update($id, $ds = array())
	{
		if( ! empty($ds))
		{
			return $this->db->where('id', $id)->update($this->tb, $ds);
		}

		return FALSE;
	}


	public function drop_customer_cart($CardCode)
	{
		return $this->db->where('CardCode', $CardCode)->delete($this->tb);
	}



	public function get_exists($CardCode, $ItemCode)
	{
		$rs = $this->db
		->where('CardCode', $CardCode)
		->where('ItemCode', $ItemCode)
		->where('is_free', 0)
		->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->row();
		}

		return NULL;
	}


	public function get_free_exists($CardCode, $ItemCode, $parent_uid)
	{
		$rs = $this->db
		->where('CardCode', $CardCode)
		->where('ItemCode', $ItemCode)
		->where('is_free', 1)
		->where('parent_uid', $parent_uid)
		->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->row();
		}

		return NULL;
	}



	public function get_sum_items_qty($CardCode)
	{
		$rs = $this->db
		->select('ItemCode')
		->select_sum('Qty')
		->select_sum('LineTotal')
		->where('CardCode', $CardCode)
		->where('is_free', 0)
		->group_by('ItemCode')
		->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}


	public function remove_free_rows($CardCode)
	{
		return $this->db->where('CardCode', $CardCode)->where('is_free', 1)->delete($this->tb);
	}



	public function get_new_line($CardCode)
	{
		$rs = $this->db->select_max('LineNum')->where('CardCode', $CardCode)->get($this->tb);
		$i = 0;

		if($rs->num_rows() === 1)
		{
			if($rs->row()->LineNum !== NULL)
			{
				$i = $rs->row()->LineNum + 1;
			}
		}

		return $i;
	}

}

 ?>
