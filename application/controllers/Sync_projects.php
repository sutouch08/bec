<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync_projects extends CI_Controller
{
  public $title = 'Sync projects';  
  private $conn;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('masters/project_model');
    $this->load->model('sync_logs_model');
    $this->load->library('hana');
    $this->conn = $this->hana->connect();
  }


  public function index()
  {
    $sc = TRUE;
    $message = NULL;
    $limit = 100;
    $offset = 0;
    $update = 0;
		$last_sync = from_date($this->project_model->get_last_sync_date());   
    $count = $this->countUpdateProject($last_sync);

    if($count > 0)
    {
      $total = $count;

      while($total > $update)
      {
        $ds = $this->getUpdateProject($last_sync, $limit, $offset);

        if(! empty($ds))
        {
          foreach($ds as $rs)
          {            
            $id = $this->project_model->get_id($rs['PrjCode']);            

            if($id)
            {
              $arr = array(
                'code' => $rs['PrjCode'],
                'name' => $rs['PrjName'],
                'active' => $rs['Active'] == 'Y' ? 1 : 0,
                'last_sync' => now()
              );

              $this->project_model->update_by_id($id, $arr);
            }
            else 
            {
              $arr = array(
                'code' => $rs['PrjCode'],
                'name' => $rs['PrjName'],
                'active' => $rs['Active'] == 'Y' ? 1 : 0,
                'last_sync' => now()
              );

              $this->project_model->add($arr);
            }
            
            $update++;
            $offset++;
          }
        }
      }
    }

    $arr = array(
      'type' => 'Projects',
      'status' => $sc === TRUE ? 'S' : 'E',
      'qty' => $update,
      'message' => $sc === FALSE ? $message : NULL
    );

    $this->sync_logs_model->add_logs($arr);
  }

  
  public function countUpdateProject($last_sync)
  {
    $qr = "SELECT COUNT(*) AS num_rows FROM BEC2.OPRJ WHERE [UpdateDate] >= '{$last_sync}'";
    $result = $this->conn->query($this->hana->SQLtoHANA($qr));
    $rows = $result->fetchAll();

    if(count($rows) === 1)
    {
      return $rows[0][0];
    }

    return 0;
  }


  public function getUpdateProject($last_sync, $limit = 100, $offset = 0)
  {    
    $qr = "SELECT [PrjCode], [PrjName], [Active] 
          FROM BEC2.OPRJ 
          WHERE [UpdateDate] >= '{$last_sync}' 
          ORDER BY [PrjCode] ASC 
          LIMIT {$limit} OFFSET {$offset}";    
    $result = $this->conn->query($this->hana->SQLtoHANA($qr));
    return $result->fetchAll();
  }  

} //--- end class

 ?>
