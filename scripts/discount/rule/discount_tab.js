function saveDiscount() {
  const id = $('#rule_id').val();

	let discType = $("input[name='discType']:checked").val();
	  //--- กำหนดราคาขาย
	let price = $('#net-price').val();

	//--- กำหนดส่วนลด
	let disc1 = parseDefault(parseFloat($('#disc1').val()), 0);
	let disc2 = parseDefault(parseFloat($('#disc2').val()), 0);
	let disc3 = parseDefault(parseFloat($('#disc3').val()), 0);
	let disc4 = parseDefault(parseFloat($('#disc4').val()), 0);
	let disc5 = parseDefault(parseFloat($('#disc5').val()), 0);

  //--- กำหนดจำนวนขั้นต่ำ
  minQty = parseDefault(parseFloat($('#min-qty').val()), 0);

  //--- กำหนดมูลค่าขั้นต่ำ
  minAmount = parseDefault(parseFloat($('#min-amount').val()), 0);

  //--- สามารถรวมยอดได้หรือไม่
  canGroup = $("input[name='canGroup']:checked").val();


  if(discType == 'N' && price <= 0) {
    swal('ข้อผิดพลาด', 'ราคาขายต้องมากกว่า 0', 'error');
		$('#net-price').addClass('has-error');
    return false;
  }
	else {
		$('#net-price').removeClass('has-error');
	}

  if(discType == 'P' && (disc1 <= 0 || disc1 > 100 )) {
    swal('ข้อผิดพลาด', 'ส่วนลดไม่ถูกต้อง', 'error');
		$('#disc1').addClass('has-error');
    return false;
  }
	else {
		$('#disc1').removeClass('has-error');
	}

	if(discType == 'P' && (disc2 < 0 || disc2 > 100 || (disc1 == 100 && disc2 > 0 ))) {
    swal('ข้อผิดพลาด', 'ส่วนลดไม่ถูกต้อง', 'error');
		$('#disc2').addClass('has-error');
    return false;
  }
	else {
		$('#disc2').removeClass('has-error');
	}

	if(discType == 'P' && (disc3 < 0 || disc3 > 100 || ((disc2 == 100 || disc2 == 0) && disc3 > 0 ))) {
    swal('ข้อผิดพลาด', 'ส่วนลดไม่ถูกต้อง', 'error');
		$('#disc3').addClass('has-error');
    return false;
  }
	else {
		$('#disc3').removeClass('has-error');
	}

	if(discType == 'P' && (disc4 < 0 || disc4 > 100 || ((disc3 == 100 || disc3 == 0) && disc4 > 0 ))) {
    swal('ข้อผิดพลาด', 'ส่วนลดไม่ถูกต้อง', 'error');
		$('#disc4').addClass('has-error');
    return false;
  }
	else {
		$('#disc4').removeClass('has-error');
	}

	if(discType == 'P' && (disc5 < 0 || disc5 > 100 || ((disc4 == 100 || disc4 == 0) && disc5 > 0 ))) {
    swal('ข้อผิดพลาด', 'ส่วนลดไม่ถูกต้อง', 'error');
		$('#disc5').addClass('has-error');
    return false;
  }
	else {
		$('#disc5').removeClass('has-error');
	}

  if(minQty < 0) {
    swal('ข้อผิดพลาด', 'จำนวนขั้นต่ำต้องไม่น้อยกว่า 0', 'error');
		$('#min-qty').addClass('has-error');
    return false;
  }
	else {
		$('#min-qty').removeClass('has-error');
	}

  if(minAmount < 0){
    swal('ข้อผิดพลาด', 'มูลค่าขั้นต่ำต้องไม่น้อยกว่า 0', 'error');
		$('#min-amount').addClass('has-error');
    return false;
  }
	else {
		$('#min-amount').removeClass('has-error');
	}

	let ds = [
		{'name' : 'rule_id' , 'value' : id},
		{'name' : 'discType', 'value' : discType},
		{'name' : 'price' , 'value' : price},
		{'name' : 'disc1' , 'value' : disc1},
		{'name' : 'disc2' , 'value' : disc2},
		{'name' : 'disc3' , 'value' : disc3},
		{'name' : 'disc4' , 'value' : disc4},
		{'name' : 'disc5' , 'value' : disc5},
		{'name' : 'minQty' , 'value' : minQty},
		{'name' : 'minAmount' , 'value' : minAmount},
		{'name' : 'canGroup' , 'value' : canGroup},
	];


	if($('.free-item-id').length) {
		$('.free-item-id').each(function() {
			let pid = $(this).val();
			let name = "freeItems["+pid+"]";
			let qty = $('#free-item-qty-'+pid).val();
			ds.push({"name" : name, "value" : qty});
		});
	}

  load_in();

  $.ajax({
    url:BASE_URL + 'discount/discount_rule/set_discount',
    type:'POST',
    cache:'false',
    data:ds,
    success:function(rs){
      load_out();
      var rs = $.trim(rs);
      if(rs == 'success'){
        swal({
          title:'Success',
          type:'success',
          timer:1000
        });

				setTimeout(function() {
					window.location.reload();
				}, 1200);
				
      }else{
        swal('Error', rs, 'error');
      }
    }
  });

}


$('#free-item-box').autocomplete({
	source: BASE_URL + 'auto_complete/get_item_code_and_name',
	autoFocus:true,
	close:function() {
		let txt = $(this).val();
		let arr = txt.split(' | ');

		if(arr.length == 3) {
			let id = arr[0];
			let code = arr[1];
			let name = arr[2];

			$(this).val(code + ' | ' + name);
			$('#temp-item-id').val(id);
		}
		else {
			$(this).val('');
			$('#temp-item-id').val('');
		}
	}
});


function addItemToList() {
	let txt = $('#free-item-box').val();
	let id = $('#temp-item-id').val();
	let qty = parseDefault(parseFloat($('#free-qty').val()), 1.00);

	if(txt.length > 0 && id != "" && id != 0) {

		if($('#free-item-qty-'+id).length) {
			let cQty = parseDefault(parseFloat($('#free-item-qty-'+id).val()), 0);
			qty += cQty;

			$('#free-item-qty-label-'+id).text(qty);
			$('#free-item-qty-'+id).val(qty);
			$('#temp-item-id').val('');
			$('#free-qty').val(1.00);
			$('#free-item-box').val('').focus();
		}
		else {

			let arr = txt.split(' | ');

			if(arr.length == 2) {
				let ds = {"id" : id, "code" : arr[0], "name" : arr[1], "qty" : qty};
				let source = $('#freeItemTemplate').html();
				let output = $('#freeItemList');

				render_append(source, ds, output);

				$('#temp-item-id').val('');
				$('#free-qty').val(1.00);
				$('#free-item-box').val('').focus();
			}
		}
	}
}


$('#free-item-box').keyup(function(e) {
	if(e.keyCode === 13) {
		addItemToList();
	}
});


function removeFreeItem() {
	$('.del-chk').each(function() {
		if($(this).is(':checked')) {
			let id = $(this).val();
			$('#free-row-'+id).remove();
		}
	})
}
function toggleDiscType(option) {
	if(option == 'N') {
		$('.disc-input').attr('disabled', 'disabled');
		$('.price-input').removeAttr('disabled');
		$('#net-price').focus();
		return;
	}

	if(option == 'P') {
		$('.price-input').attr('disabled', 'disabled');
		$('.disc-input').removeAttr('disabled');
		$('#disc1').focus();
		return;
	}
}
