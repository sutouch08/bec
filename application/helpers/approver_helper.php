<?php
function select_team($id = NULL)
{
	$ds = "<option value='-1' ".is_selected('-1', $id).">All Team</option>";

	$ci =& get_instance();

	$ci->load->model('masters/sale_team_model');

	$result = $ci->sale_team_model->get_list();

	if(!empty($result))
	{
		foreach($result as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($id, $rs->id).">{$rs->name}</option>";
		}
	}

	return $ds;
}


function select_user($uname = NULL)
{
	$ds = "";

	$ci =& get_instance();

	$result = $ci->user_model->get_users();

	if(!empty($result))
	{
		foreach($result as $rs)
		{
			$ds .= "<option value='{$rs->uname}' ".is_selected($uname, $rs->uname).">{$rs->uname} : {$rs->name}</option>";
		}
	}

	return $ds;
}
 ?>
