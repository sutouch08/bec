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


	public function get_model_name()
	{
		$txt = $_REQUEST['term'];
		$sc = array();
		$rs = $this->db->like('name', $txt)->limit(50)->get('product_model');

		if($rs->num_rows() > 0)
		{
			foreach($rs->result() as $rd)
			{
				$sc[] = $rs->name.' | '.$rs->id;
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
