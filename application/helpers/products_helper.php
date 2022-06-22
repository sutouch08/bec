<?php

function select_product_group($id = NULL)
{
	$ds = "";
	$ci =& get_instance();

	$ci->load->model('masters/product_group_model');

	$option = $ci->product_group_model->get_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($rs->id, $id).">{$rs->name}</option>";
		}
	}

	return $ds;
}


function select_product_brand($id = NULL)
{
	$ds = "";
	$ci =& get_instance();
	$ci->load->model('masters/product_brand_model');

	$option = $ci->product_brand_model->get_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($rs->id, $id).">{$rs->name}</option>";
		}
	}

	return $ds;
}



function select_product_type($id = NULL)
{
	$ds = "";
	$ci =& get_instance();
	$ci->load->model('masters/product_type_model');

	$option = $ci->product_type_model->get_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($rs->id, $id).">{$rs->name}</option>";
		}
	}

	return $ds;
}


function select_uom($id = NULL)
{
	$ds = "";
	$ci =& get_instance();
	$ci->load->model('masters/uom_model');

	$option = $ci->uom_model->get_all();

	if(! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($rs->id, $id).">{$rs->name}</option>";
		}
	}

	return $ds;
}

function select_vat_group($code = NULL)
{
	$ds = "";
	$ci =& get_instance();
	$ci->load->model('masters/vat_group_model');
	$option = $ci->vat_group_model->get_active_all();

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->code}' ".is_selected($rs->code, $code).">{$rs->name}</option>";
		}
	}

	return $ds;
}

function select_product_category($id = NULL)
{
	$ci =& get_instance();
	$ci->load->model('masters/product_category_model');

	$ds = '';

	$parent = 0;

	$root = $ci->product_category_model->get_by_parent($parent);

	if(!empty($root))
	{
		foreach($root as $rs)
		{
			$ds .= '<option value="'.$rs->id.'" '.is_selected($id, $rs->id).'>+ '.$rs->name.'</option>';

			$level_2 = $ci->product_category_model->get_by_parent($rs->id);

			if(! empty($level_2))
			{
				foreach($level_2 as $l2)
				{
					$ds .= '<option value="'.$l2->id.'" '.is_selected($id, $l2->id).'>++ '.$l2->name.'</option>';

					$level_3 = $ci->product_category_model->get_by_parent($l2->id);

					if( ! empty($level_3))
					{
						foreach($level_3 as $l3)
						{
							$ds .= '<option value="'.$l3->id.'" '.is_selected($id, $l3->id).'>+++ '.$l3->name.'</option>';

							$level_4 = $ci->product_category_model->get_by_parent($l3->id);

							if( ! empty($level_4))
							{
								foreach($level_4 as $l4)
								{
									$ds .= '<option value="'.$l4->id.'" '.is_selected($id, $l4->id).'>++++ '.$l4->name.'</option>';

									$level_5 = $ci->product_category_model->get_by_parent($l4->id);

									if( ! empty($level_5))
									{
										foreach($level_5 as $l5)
										{
											$ds .= '<option value="'.$l5->id.'" '.is_selected($id, $l5->id).'>+++++ '.$l5->name.'</option>';
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	return $ds;
}



function select_category_level($level, $id)
{
	$ci =& get_instance();
	$ci->load->model('masters/product_category_model');

	$ds = "";

	$option = $ci->product_category_model->get_by_level($level);

	if( ! empty($option))
	{
		foreach($option as $rs)
		{
			$ds .= "<option value='{$rs->id}' ".is_selected($id, $rs->id).">{$rs->name}</option>";
		}
	}

	return $ds;
}



function model_in($txt = "")
{
	$sc[] = -1;

	$txt = trim($txt);

	if($txt != "")
	{
		$ci =& get_instance();

		$qr = "SELECT id FROM product_model WHERE name LIKE '%{$txt}%'";

		$qs = $ci->db->query($qr);

		if($qs->num_rows() > 0)
		{
			foreach($qs->result() as $rs)
			{
				$sc[] = $rs->id;
			}
		}
	}

	return $sc;
}





 ?>
