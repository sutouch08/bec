<?php
function payments_array()
{
	$ds = array();
	$ci =& get_instance();
	$ci->load->model('masters/payment_term_model');
	$option = $ci->payment_term_model->get_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds[$rs->id] = $rs->name;
		}
	}

	return $ds;
}
 ?>
