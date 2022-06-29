<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_complete extends CI_Controller
{
  public $ms;
  public function __construct()
  {
    parent::__construct();
  }


  public function get_customer_code_and_name()
  {
    $txt = $_REQUEST['term'];
    $sc = array();
    $this->db
    ->select('CardCode AS code, CardName AS name')
    ->where('CardType', 'C')
		->where('Status', 1);

		if($txt != '*')
		{
			$this->db
			->group_start()
			->like('CardCode', $txt)
			->or_like('CardName', $txt)
			->group_end();
		}

		$rs = $this->db
    ->limit(50)
    ->get('customers');

    if($rs->num_rows() > 0)
    {
      foreach($rs->result() as $rd)
      {
        $sc[] = $rd->code.' | '.$rd->name;
      }
    }
		else
		{
			$sc[] = "Not found";
		}

    echo json_encode($sc);
  }


	public function get_customer_list()
	{
		$txt = $_REQUEST['term'];
    $sc = array();
    $this->db
    ->select('id, CardCode AS code, CardName AS name')
    ->where('CardType', 'C')
		->where('Status', 1);

		if($txt != '*')
		{
			$this->db
			->group_start()
			->like('CardCode', $txt)
			->or_like('CardName', $txt)
			->group_end();
		}

		$rs = $this->db
    ->limit(50)
    ->get('customers');

    if($rs->num_rows() > 0)
    {
      foreach($rs->result() as $rd)
      {
        $sc[] = $rd->id.' | '.$rd->code.' | '.$rd->name;
      }
    }
		else
		{
			$sc[] = "Not found";
		}

    echo json_encode($sc);
	}



	public function get_item_code_and_name()
	{
		$txt = $_REQUEST['term'];
		$sc = array();

		if($txt != '*')
		{
			$this->db->like('code', $txt)->or_like('name', $txt);
		}

		$rs = $this->db->limit(50)->get('products');

		if($rs->num_rows() > 0)
		{
			foreach($rs->result() as $rd)
			{
				$sc[] = $rd->id.' | '.$rd->code.' | '.$rd->name;
			}
		}
		else
		{
			$sc[] = "Not found";
		}

		echo json_encode($sc);
	}


	public function get_model_name()
	{
		$txt = $_REQUEST['term'];
		$sc = array();

		if($txt != "*")
		{
			$this->db->like('name', $txt);
		}

		$rs = $this->db->limit(50)->get('product_model');

		if($rs->num_rows() > 0)
		{
			foreach($rs->result() as $rd)
			{
				$sc[] = $rd->id.' | '.$rd->name;
			}
		}
		else
		{
			$sc[] = "Not found";
		}

		echo json_encode($sc);
	}

} //-- end class
?>
