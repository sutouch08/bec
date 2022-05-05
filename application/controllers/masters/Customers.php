<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends PS_Controller
{
  public $menu_code = 'DBCUST';
	public $menu_group_code = 'DB';
  public $menu_sub_group_code = 'CUSTOMER';
	public $title = 'Customers';

  public function __construct()
  {
    parent::__construct();
    $this->home = base_url().'masters/customers';
		$this->load->helper('customer');
  }


  public function index()
  {
		//--- แสดงผลกี่รายการต่อหน้า
		$perpage = get_rows();
		//--- หาก user กำหนดการแสดงผลมามากเกินไป จำกัดไว้แค่ 300
		if($perpage > 300)
		{
			$perpage = 20;
		}

		$segment  = 4; //-- url segment
		$rows     = 200; //$this->orders_model->count_rows($filter);
		//--- ส่งตัวแปรเข้าไป 4 ตัว base_url ,  total_row , perpage = 20, segment = 3
		$init	    = pagination_config($this->home.'/index/', $rows, $perpage, $segment);
		$offset   = $rows < $this->uri->segment($segment) ? NULL : $this->uri->segment($segment);
		$this->pagination->initialize($init);
    $this->load->view('masters/customers/customers_view');
  }



  public function edit()
  {
		$this->title = "Edit customer";
		$this->load->view('masters/customers/customers_edit_view');
  }


  public function add_bill_to($code)
  {
    if($this->input->post('address'))
    {
      $this->load->model('address/customer_address_model');
      $branch_code = $this->input->post('branch_code');
      $branch_name = $this->input->post('branch_name');
      $country = $this->input->post('country');
      $ds = array(
        //'code' => $code,
        'customer_code' => $code,
        'branch_code' => empty($branch_code) ? '000' : $branch_code,
        'branch_name' => empty($branch_name) ? 'สำนักงานใหญ่' : $branch_name,
        'address' => $this->input->post('address'),
        'sub_district' => $this->input->post('sub_district'),
        'district' => $this->input->post('district'),
        'province' => $this->input->post('province'),
        'postcode' => $this->input->post('postcode'),
        'country' => empty($country) ? 'TH' : $country,
        'phone' => $this->input->post('phone')
      );

      $rs = $this->customer_address_model->add_bill_to($ds);
      if($rs === TRUE)
      {
        set_message("เพิ่มที่อยู่เปิดบิลเรียบร้อยแล้ว");
        $this->export_bill_to_address($code);
      }
      else
      {
        set_error("เพิ่มที่อยู่ไม่สำเร็จ");
      }
    }
    else
    {
      set_error("ที่อยู่ต้องไม่ว่างเปล่า");
    }

    redirect($this->home.'/edit/'.$code.'/billTab');
  }



  public function update_bill_to($code)
  {
    if($this->input->post('address'))
    {
      $this->load->model('address/customer_address_model');
      $branch_code = $this->input->post('branch_code');
      $branch_name = $this->input->post('branch_name');
      $country = $this->input->post('country');
      $ds = array(
        'branch_code' => empty($branch_code) ? '000' : $branch_code,
        'branch_name' => empty($branch_name) ? 'สำนักงานใหญ่' : $branch_name,
        'address' => $this->input->post('address'),
        'sub_district' => $this->input->post('sub_district'),
        'district' => $this->input->post('district'),
        'province' => $this->input->post('province'),
        'postcode' => $this->input->post('postcode'),
        'country' => empty($country) ? 'TH' : $country,
        'phone' => $this->input->post('phone')
      );

      $rs = $this->customer_address_model->update_bill_to($code, $ds);

      if($rs === TRUE)
      {
        $this->export_bill_to_address($code);

        set_message("ปรับปรุงที่อยู่เปิดบิลเรียบร้อยแล้ว");
      }
      else
      {
        set_error("ปรับปรุงที่อยู่ไม่สำเร็จ");
      }
    }
    else
    {
      set_error("ที่อยู่ต้องไม่ว่างเปล่า");
    }

    redirect($this->home.'/edit/'.$code.'/billTab');
  }


  public function export_bill_to_address($code)
  {
    $this->load->model('address/customer_address_model');
    $addr = $this->customer_address_model->get_customer_bill_to_address($code);
    if(!empty($addr))
    {
      $ex = $this->customer_address_model->is_sap_address_exists($code, $addr->address_code);
      if(! $ex)
      {
        $ds = array(
          'Address' => $addr->address_code,
          'CardCode' => $addr->customer_code,
          'Street' => $addr->address,
          'Block' => $addr->sub_district,
          'ZipCode' => $addr->postcode,
          'City' => $addr->province,
          'County' => $addr->district,
          'LineNum' => ($this->customer_address_model->get_max_line_num($code, 'B') + 1),
          'AdresType' => 'B',
          'Address2' => $addr->branch_code,
          'Address3' => $addr->branch_name,
          'F_E_Commerce' => $ex ? 'U' : 'A',
          'F_E_CommerceDate' => sap_date(now(), TRUE)
        );

        $this->customer_address_model->add_sap_bill_to($ds);
      }
      else
      {
        $ds = array(
          'Address' => $addr->address_code,
          'CardCode' => $addr->customer_code,
          'Street' => $addr->address,
          'Block' => $addr->sub_district,
          'ZipCode' => $addr->postcode,
          'City' => $addr->province,
          'County' => $addr->district,
          'AdresType' => 'B',
          'Address2' => $addr->branch_code,
          'Address3' => $addr->branch_name,
          'F_E_Commerce' => $ex ? 'U' : 'A',
          'F_E_CommerceDate' => sap_date(now(),TRUE)
        );

        $this->customer_address_model->update_sap_bill_to($code, $addr->address_code, $ds);
      }
    }
  }



  public function export_ship_to_address($id)
  {
    $this->load->model('address/customer_address_model');
    $addr = $this->customer_address_model->get_customer_ship_to_address($id);
    if(!empty($addr))
    {
      $ex = $this->customer_address_model->is_sap_address_exists($code, $rs->address_code, 'S');
      if(! $ex)
      {
        $ds = array(
          'Address' => $rs->address_code,
          'CardCode' => $rs->customer_code,
          'Street' => $rs->address,
          'Block' => $rs->sub_district,
          'ZipCode' => $rs->postcode,
          'City' => $rs->province,
          'County' => $rs->district,
          'LineNum' => ($this->customer_address_model->get_max_line_num($code, 'S') + 1),
          'AdresType' => 'S',
          'Address2' => '0000',
          'Address3' => 'สำนักงานใหญ่',
          'F_E_Commerce' => $ex ? 'U' : 'A',
          'F_E_CommerceDate' => sap_date(now(), TRUE)
        );

        $this->customer_address_model->add_sap_ship_to($ds);
      }
      else
      {
        $ds = array(
          'Address' => $rs->address_code,
          'CardCode' => $rs->customer_code,
          'Street' => $rs->address,
          'Block' => $rs->sub_district,
          'ZipCode' => $rs->postcode,
          'City' => $rs->province,
          'County' => $rs->district,
          'AdresType' => 'S',
          'Address2' => '0000',
          'Address3' => 'สำนักงานใหญ่',
          'F_E_Commerce' => $ex ? 'U' : 'A',
          'F_E_CommerceDate' => sap_date(now(), TRUE)
        );

        $this->customer_address_model->update_sap_ship_to($code, $rs->address_code, $ds);
      }
    }
  }



  public function update()
  {
    $sc = TRUE;

    if($this->input->post('code'))
    {
      $old_code = $this->input->post('customers_code');
      $old_name = $this->input->post('customers_name');
      $code = $this->input->post('code');
      $name = $this->input->post('name');
      $gp = $this->input->post('gp');
      $skip_overdue = $this->input->post('skip_overdue');
      $fml_code = get_null($this->input->post('old_code'));

      $ds = array(
        'code' => $code,
        'name' => $name,
        'Tax_Id' => $this->input->post('Tax_Id'),
        'DebPayAcct' => $this->input->post('DebPayAcct'),
        'GroupCode' => $this->input->post('GroupCode'),
        'cmpPrivate' => $this->input->post('cmpPrivate'),
        'GroupNum' => $this->input->post('GroupNum'),
        'group_code' => get_null($this->input->post('group')),
        'kind_code' => get_null($this->input->post('kind')),
        'type_code' => get_null($this->input->post('type')),
        'class_code' => get_null($this->input->post('class')),
        'area_code' => get_null($this->input->post('area')),
        'sale_code' => get_null($this->input->post('sale')),
        'CreditLine' => floatval($this->input->post('CreditLine')),
        'old_code' => $fml_code,
        'gp' => $gp,
        'skip_overdue' => $skip_overdue
      );

      if($sc === TRUE && $this->customers_model->is_exists($code, $old_code) === TRUE)
      {
        $sc = FALSE;
        set_error("'".$code."' มีอยู่ในระบบแล้ว โปรดใช้รหัสอื่น");
      }

      if($sc === TRUE && $this->customers_model->is_exists_name($name, $old_name) === TRUE)
      {
        $sc = FALSE;
        set_error("'".$name."' มีอยู่ในระบบแล้ว โปรดใช้ชื่ออื่น");
      }

      if($sc === TRUE)
      {
        if($this->customers_model->update($old_code, $ds) === TRUE)
        {
          set_message('ปรับปรุงข้อมูลเรียบร้อยแล้ว');
        }
        else
        {
          $sc = FALSE;
          set_error('ปรับปรุงข้อมูลไม่สำเร็จ');
        }
      }

    }
    else
    {
      $sc = FALSE;
      set_error('ไม่พบข้อมูล');
    }

    if($sc === FALSE)
    {
      $code = $this->input->post('customers_code');
    }

    redirect($this->home.'/edit/'.$code);
  }



  public function delete($code)
  {
    if($code != '')
    {
      $rs = $this->customers_model->delete($code);
      if($rs === TRUE)
      {
        set_message('ลบข้อมูลเรียบร้อยแล้ว');
      }
      else
      {
        if($rs['code'] === '23000/1451')
        {
          $message = "Customer alrady has transection(s)";
        }
        else
        {
          $message = "ลบข้อมูลไม่สำเร็จ";
        }
        set_error($message);
      }
    }
    else
    {
      set_error('ไม่พบข้อมูล');
    }

    redirect($this->home);
  }




  public function do_export($code)
  {
    $this->load->model('masters/slp_model');
    $cs = $this->customers_model->get($code);
    if(!empty($cs))
    {
      $ds = array(
        'CardCode' => $cs->code,
        'CardName' => $cs->name,
        'CardType' => $cs->CardType,
        'GroupCode' => $cs->GroupCode,
        'CmpPrivate' => $cs->cmpPrivate,
        'SlpCode' => $cs->sale_code,
        //'SlpName' => $this->slp_model->get_name($cs->sale_code),
        'Currency' => getConfig('CURRENCY'),
        'GroupNum' => $cs->GroupNum,
        'VatStatus' => 'Y',
        'LicTradNum' => $cs->Tax_Id,
        'DebPayAcct' => $cs->DebPayAcct,
        'U_BPBACKLIST' => 'N',
        'F_E_Commerce' => 'A',
        'F_E_CommerceDate' => sap_date($cs->date_upd, TRUE)
      );

      if($this->customers_model->sap_customer_exists($cs->code))
      {
        $ds['F_E_Commerce'] = 'U';

        return $this->customers_model->update_sap_customer($cs->code, $ds);
      }
      else
      {
        return $this->customers_model->add_sap_customer($ds);
      }

    }

    return FALSE;
  }



  public function export_customer($code)
  {
    $rs = $this->do_export($code);
    if($rs === TRUE)
    {
      $this->export_bill_to_address($code);
      $this->export_ship_to_address($code);
      echo 'success';
    }
    else
    {
      echo 'Export fail';
    }

  }




  public function syncData()
  {
    $last_sync = $this->customers_model->get_last_sync_date();
    $ds = $this->customers_model->get_update_data($last_sync);
    if(!empty($ds))
    {
      foreach($ds as $rs)
      {
        $arr = array(
          'code' => $rs->code,
          'name' => $rs->name,
          'Tax_Id' => $rs->Tax_Id,
          'DebPayAcct' => $rs->DebPayAcct,
          'CardType' => $rs->CardType,
          'GroupCode' => $rs->GroupCode,
          'cmpPrivate' => $rs->CmpPrivate,
          'GroupNum' => $rs->GroupNum,
          'sale_code' => $rs->sale_code,
          'CreditLine' => floatval($rs->CreditLine),
          'old_code' => $rs->old_code,
          'last_sync' => now()
        );

        if($this->customers_model->is_exists($rs->code) === TRUE)
        {
          $this->customers_model->update($rs->code, $arr);
        }
        else
        {
          $this->customers_model->add($arr);
        }
      }
    }

    set_message('Sync completed');
  }



  public function syncAllData()
  {
    $last_sync = from_date('2020-01-01');
    $ds = $this->customers_model->get_update_data($last_sync);
    if(!empty($ds))
    {
      foreach($ds as $rs)
      {
        $arr = array(
          'code' => $rs->code,
          'name' => $rs->name,
          'Tax_Id' => $rs->Tax_Id,
          'DebPayAcct' => $rs->DebPayAcct,
          'CardType' => $rs->CardType,
          'GroupCode' => $rs->GroupCode,
          'cmpPrivate' => $rs->CmpPrivate,
          'GroupNum' => $rs->GroupNum,
          'sale_code' => $rs->sale_code,
          'CreditLine' => floatval($rs->CreditLine),
          'old_code' => $rs->old_code,
          'last_sync' => now()
        );

        if($this->customers_model->is_exists($rs->code) === TRUE)
        {
          $this->customers_model->update($rs->code, $arr);
        }
        else
        {
          $this->customers_model->add($arr);
        }
      }
    }

    set_message('Sync completed');
  }


  public function clear_filter()
	{
    $filter = array( 'code', 'name','group','kind','type', 'class','area');
    clear_filter($filter);
	}


  public function get_new_code($code)
  {
    $max = $this->customer_address_model->get_max_code($code);
    $max++;
    return $max;
  }

  public function get_ship_to_table()
  {
    $sc = TRUE;
    if($this->input->post('customer_code'))
    {
      $code = $this->input->post('customer_code');
      if(!empty($code))
      {
        $ds = array();
        $this->load->model('address/customer_address_model');
        $adrs = $this->customer_address_model->get_ship_to_address($code);
        if(!empty($adrs))
        {
          foreach($adrs as $rs)
          {
            $arr = array(
              'id' => $rs->id,
              'name' => $rs->name,
              'address' => $rs->address.' '.$rs->sub_district.' '.$rs->district.' '.$rs->province.' '.$rs->postcode,
              'phone' => $rs->phone,
              'email' => $rs->email,
              'alias' => $rs->alias,
              'default' => $rs->is_default == 1 ? 1 : ''
            );
            array_push($ds, $arr);
          }
        }
        else
        {
          $sc = FALSE;
        }
      }
      else
      {
        $sc = FALSE;
      }
    }

    echo $sc === TRUE ? json_encode($ds) : 'noaddress';
  }



  public function delete_shipping_address()
  {
    $this->load->model('address/address_model');
    $id = $this->input->post('id_address');
    $rs = $this->address_model->delete_shipping_address($id);
    echo $rs === TRUE ? 'success' : 'fail';
  }

} //---

?>
