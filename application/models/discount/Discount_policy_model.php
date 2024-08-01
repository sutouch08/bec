<?php
class Discount_policy_model extends CI_Model
{
	private $tb = "discount_policy";

  public function __construct()
  {
    parent::__construct();
  }


  public function add(array $ds = array())
  {
    if($this->db->insert($this->tb, $ds))
		{
			return $this->db->insert_id();
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


	public function clear_discount_rule($id_policy)
	{
		return $this->db->set('id_policy', NULL)->where('id_policy', $id_policy)->update('discount_rule');
	}


  public function get($id)
  {
    $rs = $this->db
		->where('id', $id)
		->get($this->tb);
    if($rs->num_rows() == 1)
    {
      return $rs->row();
    }

    return NULL;
  }


  public function get_code($id)
  {
    $rs = $this->db
		->select('code')
    ->where('id', $id)
    ->get($this->tb);

    if($rs->num_rows() == 1)
    {
      return $rs->row()->code;
    }

    return NULL;
  }


  public function get_name($id)
  {
    $rs = $this->db
		->select('name')
    ->where('id', $id)
    ->get($this->tb);

    if($rs->num_rows() == 1)
    {
      return $rs->row()->name;
    }

    return NULL;
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

		if(isset($ds['active']) && $ds['active'] != 'all')
		{
			$this->db->where('active', $ds['active']);
		}

		if( ! empty($ds['start_date']) && ! empty($ds['end_date']))
		{
			$this->db
			->group_start()
			->where('start_date >=', from_date($ds['start_date']))
			->where('end_date <=', to_date($ds['end_date']))
			->group_end();
		}

    return $this->db->count_all_results($this->tb);
  }



  public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
  {
		if(isset($ds['code']) && $ds['code'] != "")
		{
			$this->db->like('code', $ds['code']);
		}

		if(isset($ds['name']) && $ds['name'] != "")
		{
			$this->db->like('name', $ds['name']);
		}

		if(isset($ds['active']) && $ds['active'] != 'all')
		{
			$this->db->where('active', $ds['active']);
		}

		if( ! empty($ds['start_date']) && ! empty($ds['end_date']))
		{
			$this->db
			->group_start()
			->where('start_date >=', from_date($ds['start_date']))
			->where('end_date <=', to_date($ds['end_date']))
			->group_end();
		}

		$rs = $this->db->order_by('code', 'DESC')->limit($perpage, $offset)->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
  }



  public function get_by_code($code)
  {
    $rs = $this->db
		->where('code', $code)
		->get($this->tb);

    if($rs->num_rows() == 1)
    {
      return $rs->row();
    }

    return NULL;
  }




  public function get_max_code($code)
  {
    $qr = "SELECT MAX(code) AS code FROM discount_policy WHERE code LIKE '".$code."%' ORDER BY code DESC";
    $rs = $this->db->query($qr);
    return $rs->row()->code;
  }



  public function search($txt)
  {
    $rs = $this->db->select('id')
    ->like('code', $txt)
    ->like('name', $txt)
    ->get($this->tb);
    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return array();
  }

} //--- end class

 ?>
