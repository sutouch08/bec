<?php

function select_projects($code = '')
{
  $ci =& get_instance();
  $ci->load->model('masters/project_model');

  $list = $ci->project_model->get_all_active();
  $options = '';
  
  if(!empty($list))
  {
    foreach($list as $rs)
    {
      $selected = ($code == $rs->code) ? 'selected' : '';
      $options .= '<option value="'.$rs->code.'" '.$selected.'>'.$rs->code.' | '.$rs->name.'</option>';
    }
  }

  return $options;
}