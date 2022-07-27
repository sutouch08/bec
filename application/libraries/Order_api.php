<?php
class Order_api
{
  private $url;
  protected $ci;
	public $error;

  public function __construct()
  {
		$this->ci =& get_instance();

    $this->url = getConfig('SAP_API_HOST');
		if($this->url[-1] != '/')
		{
			$this->url .'/';
		}
  }



	public function cancle_sap_order($arr)
	{
		$url = $this->url .'SalesOrder';
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($arr));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

		$response = curl_exec($curl);
		curl_close($curl);
		$rs = json_decode($response);

		if(! empty($rs) && ! empty($rs->status))
		{
			if($rs->status == 'success')
			{
				return TRUE;
			}
			else
			{
				$this->error = $rs->error;
			}
		}
    else
    {
      $this->error = "no data";
    }

    return FALSE;
	}



} //--- end class
?>
