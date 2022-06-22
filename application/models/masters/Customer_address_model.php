<?php
class Customer_address_model extends CI_Model
{
  public $tb = "customer_address";

  public function __construct()
  {
    parent::__construct();
  }


  public function add(array $ds = array())
  {
    if(!empty($ds))
    {
      return  $this->db->insert($this->tb, $ds);
    }

    return FALSE;
  }



  public function update($id, array $ds = array())
  {
    if(!empty($ds))
    {
      $this->db->where('id', $id);
      return $this->db->update($this->tb, $ds);
    }

    return FALSE;
  }


  public function delete($id)
  {
    return $this->db->where('id', $id)->delete($this->tb);
  }



  public function count_rows(array $ds = array())
  {
		if($ds['address'] != "")
    {
      $this->db->like('Address', $ds['address']);
    }

		if($ds['code'] != "")
		{
			$this->db->like('CardCode', $ds['code']);
		}

		if($ds['type'] != "all")
		{
			$this->db->where('CardType', $ds['type']);
		}


    return $this->db->count_all_results($this->tb);
  }


  public function get_list(array $ds = array(), $perpage = 20, $offset = 0)
  {
    if($ds['address'] != "")
    {
      $this->db->like('Address', $ds['address']);
    }

		if($ds['code'] != "")
		{
			$this->db->like('CardCode', $ds['code']);
		}

		if($ds['type'] != "all")
		{
			$this->db->where('CardType', $ds['type']);
		}

    $rs = $this->db->order_by('CardCode', 'ASC')->limit($perpage, $offset)->get($this->tb);

    if($rs->num_rows() > 0)
    {
      return $rs->result();
    }

    return NULL;
  }



  public function get($CardCode, $CardType, $Address)
  {
    $rs = $this->db
		->where('CardCode', $CardCode)
		->where('CardType', $CardType)
		->where('Address', $Address)
		->get($this->tb);

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


	public function get_all()
	{
		$rs = $this->db->get($this->tb);

		if($rs->num_rows() > 0)
		{
			return $rs->result();
		}

		return NULL;
	}




  public function is_exists($CardCode, $CardType, $Address)
  {
    $rs = $this->db
		->where('CardCode', $CardCode)
		->where('CarType', $CardType)
		->where('Address', $Address)
		->count_all_results($this->tb);

		if($rs > 0)
		{
			return TRUE;
		}

		return FALSE;
  }

}
?>
