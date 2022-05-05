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
    ->select('code, name')
    ->where('CardType', 'C')
		->where('active', 1);

		if($txt != '*')
		{
			$this->db
			->group_start()
			->like('code', $txt)
			->or_like('name', $txt)
			->group_end();
		}

		$rs = $this->db
    ->limit(20)
    ->get('customers');

    if($rs->num_rows() > 0)
    {
      foreach($rs->result() as $rd)
      {
        $sc[] = $rd->code.' | '.$rd->name;
      }
    }

    echo json_encode($sc);
  }



	public function get_style_code()
	{
		$sc = array(
			'3673014376 | โคมไฟติดลอย รุ่น SJ6371/6C',
			'3881010245 | BEC โคมฉาย LED 100 วัตต์ แสงวอร์มไวท์ รุ่น ZONIC เดย์ไลท์ 50 วัตต์',
			'3881010445 | BEC โคมไฟฟลัดไลท์ LED STEEM ขนาด 100 วัตต์ 7000K',
			'SKU-00918 | La-Z-Boy เก้าอี้ปรับเอนนอน รุ่น 1PT-505 Rialto'
		);

		echo json_encode($sc);
	}

  public function sub_district()
  {
    $sc = array();
    $adr = $this->db->like('tumbon', $_REQUEST['term'])->limit(20)->get('address_info');
    if($adr->num_rows() > 0)
    {
      foreach($adr->result() as $rs)
      {
        $sc[] = $rs->tumbon.'>>'.$rs->amphur.'>>'.$rs->province.'>>'.$rs->zipcode;
      }
    }

    echo json_encode($sc);
  }


  public function district()
  {
    $sc = array();
    $adr = $this->db->select("amphur, province, zipcode")
    ->like('amphur', $_REQUEST['term'])
    ->group_by('amphur')
    ->group_by('province')
    ->limit(20)->get('address_info');
    if($adr->num_rows() > 0)
    {
      foreach($adr->result() as $rs)
      {
        $sc[] = $rs->amphur.'>>'.$rs->province.'>>'.$rs->zipcode;
      }
    }

    echo json_encode($sc);
  }


	public function province()
  {
    $sc = array();
    $adr = $this->db->select("province")
    ->like('province', $_REQUEST['term'])
    ->group_by('province')
    ->limit(20)->get('address_info');
    if($adr->num_rows() > 0)
    {
      foreach($adr->result() as $rs)
      {
        $sc[] = $rs->province;
      }
    }

    echo json_encode($sc);
  }


	public function postcode()
  {
    $sc = array();
    $adr = $this->db->like('zipcode', $_REQUEST['term'])->limit(20)->get('address_info');
    if($adr->num_rows() > 0)
    {
      foreach($adr->result() as $rs)
      {
        $sc[] = $rs->tumbon.'>>'.$rs->amphur.'>>'.$rs->province.'>>'.$rs->zipcode;
      }
    }

    echo json_encode($sc);
  }


} //-- end class
?>
