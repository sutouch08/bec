<?php
function select_warehouse($id = NULL)
{
	$ds = '';

	$ci =& get_instance();
	$ci->load->model('masters/warehouse_model');
	$option = $ci->warehouse_model->get_all();

	if(!empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= '<option value="'.$rs->id.'" '.is_selected($rs->id, $id).'>'.$rs->code.' : '.$rs->name.'</option>';
		}
	}

	return $ds;
}
?>
