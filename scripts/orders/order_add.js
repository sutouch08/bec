$('#DocDate').datepicker({
	dateFormat: 'dd-mm-yy'
});

$('#ShipDate').datepicker({
	dateFormat: 'dd-mm-yy'
});

$('#TextDate').datepicker({
	dateFormat: 'dd-mm-yy'
});

$('#customer_code').autocomplete({
	source:BASE_URL + 'auto_complete/get_customer_code_and_name',
	autoFocus:true,
	close:function() {
		let cs = $(this).val();
		let arr = cs.split(' | ');

		if(arr.length == 2) {
			$(this).val(arr[0]);
			$('#customer_name').val(arr[1]);
			updatePaymentTerm();
		}
		else {
			$(this).val('');
			$('#customer_name').val('');
		}
	}
});


function updatePaymentTerm() {
	let customer_code = $('#customer_code').val();

	$.ajax({
		url:BASE_URL + 'masters/customers/get_customer_term',
		type:'GET',
		cache:false,
		data:{
			'customer_code' : customer_code
		},
		success:function(rs) {
			if(rs != "not found") {
				$('#payment').val(rs);
			}
		}
	})
}


function getEdit() {
	$('.edit').removeAttr('disabled');
	$('#btn-edit').addClass('hide');
	$('#btn-update').removeClass('hide');
}


function saveAdd() {
	let customer_code = $('#customer_code').val();
	let channels = $('#channels').val();
	let doc_date = $('#DocDate').val();
	let ship_date = $('#ShipDate').val();
	let text_date = $('#TextDate').val();
	let remark = $.trim($('#remark').val());
	let batch_no = $('#batchNo').val();

	if(customer_code.length == 0) {
		$('#customer_code').addClass('has-error');
		swal("Invalid customer");
		return false;
	}
	else {
		$('#customer_code').removeClass('has-error');
	}


	load_in();
	$.ajax({
		url:HOME + 'add',
		type:'POST',
		cache:false,
		data:{
			'customer_code' : customer_code,
			'channels' : channels,
			'doc_date' : doc_date,
			'ship_date' : ship_date,
			'text_date' : text_date,
			'remark' : remark,
			'batchNo' : batch_no
		},
		success:function(rs) {
			load_out();
			if(isJson(rs)) {
				let ds = $.parseJSON(rs);
				edit(ds.code);
			}
			else {
				swal({
					title:'Error!',
					text:rs,
					type:'error'
				});
			}
		}
	});
}



function update() {
	let customer_code = $('#customer_code').val();
	let channels = $('#channels').val();
	let doc_date = $('#DocDate').val();

	let current_customer_code = $('#current_customer_code').val();
	let current_channels = $('#current_channels').val();
	let current_posting_date = $('#current_posting_date').val();

	if((customer_code != current_customer_code) || (channels != current_channels) || (doc_date != current_posting_date)) {
		swal({
			title: "คำนวนส่วนลดใหม่หรือไม่ ?",
			text: "เนื่องจากมีการเปลี่ยนแปลงข้อมูลสำคัญที่มีผลต่อเงื่อนไขส่วนลด <br/>คุณต้องการคำนวนส่วนลดใหม่หรือไม่ ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#428bca",
			cancelButtonColor: "#DD6B55",
			confirmButtonText: 'คำนวนส่วนลดใหม่',
			cancelButtonText: 'ไม่ต้องคำนวนใหม่',
			closeOnConfirm: true,
			html:true
		}, function(isConfirm){
				if(isConfirm) {
					doUpdate('recal');
				}
				else {
					doUpdate('not_recal');
				}
		});
	}
	else {
		doUpdate('not_recal');
	}
}


function doUpdate(option) {

	console.log(option);
	return false;
	let customer_code = $('#customer_code').val();
	let channels = $('#channels').val();
	let doc_date = $('#DocDate').val();
	let ship_date = $('#ShipDate').val();
	let text_date = $('#TextDate').val();
	let remark = $.trim($('#remark').val());

	if(customer_code.length == 0) {
		$('#customer_code').addClass('has-error');
		swal("Invalid customer");
		return false;
	}
	else {
		$('#customer_code').removeClass('has-error');
	}


	load_in();
	$.ajax({
		url:HOME + 'add',
		type:'POST',
		cache:false,
		data:{
			'customer_code' : customer_code,
			'channels' : channels,
			'doc_date' : doc_date,
			'ship_date' : ship_date,
			'text_date' : text_date,
			'remark' : remark
		},
		success:function(rs) {
			load_out();
			if(isJson(rs)) {
				let ds = $.parseJSON(rs);
				edit(ds.code);
			}
			else {
				swal({
					title:'Error!',
					text:rs,
					type:'error'
				});
			}
		}
	});
}



$('#item-name').autocomplete({
	source:BASE_URL + 'auto_complete/get_item_code_and_name',
	autoFocus:true,
	close:function() {
		let item = $(this).val();
		let arr = item.split(' | ');

		if(arr.length == 3) {
			let id = arr[0];
			let code = arr[1];
			let name = arr[2];

			$('#item-id').val(id);
			$('#item-code').val(code);
			$('#item-name').val(code + ' : ' + name);
			getPrice(code);
			getStock(code);
		}
		else {
			clearItem();
		}
	}
});


function clearItem() {
	$('#item-id').val('');
	$('#item-code').val('');
	$('#item-name').val('');
	$('#in-stock').val('');
	$('#team-stock').val('');
	$('#commit-stock').val('');
	$('#available-stock').val('');
	$('#item-qty').val('');
	$('#item-name').focus();
}


function getPrice(itemCode) {
	if(itemCode.length) {
		let priceList = $('#priceList').val();
		$.ajax({
			url:HOME + 'get_item_price',
			type:'GET',
			cache:false,
			data:{
				"itemCode" : itemCode,
				"priceList" : priceList
			},
			success:function(rs) {
				if(isJson(rs)) {
					let ds = $.parseJSON(rs);
					if(ds.status == 'success') {
						$('#item-price').val(ds.Price);
					}
					else {
						$('#item-price').val(0);
					}
				}
			}
		});
	}
}



function getStock(itemCode) {
	if(itemCode.length) {
		let batchNo = $('#batchNo').val();
		$.ajax({
			url:HOME + 'get_item_stock',
			type:'GET',
			cache:false,
			data:{
				"itemCode" : itemCode,
				"batchNo" : batchNo
			},
			success:function(rs) {
				if(isJson(rs)) {
					let ds = $.parseJSON(rs);
					if(ds.status == 'success') {
						$('#in-stock').val(ds.OnHand);
						$('#team-stock').val(ds.BatchQty);
						$('#commit-stock').val(ds.Committed);
						$('#available-stock').val(ds.Available);
						$('#item-qty').focus();
					}
				}
			}
		})
	}
}


function addItemToOrder() {
	let order_code = $('#code').val();
	let itemCode = $('#item-code').val();
	let itemId = $('#item-id').val();
	let qty = parseDefault(parseFloat($('#item-qty').val()), 0);
	let price = parseDefault(parseFloat($('#item-price').val()), 0);

	if(qty > 0) {
		$.ajax({
			url:HOME + 'add_to_order',
			type:'POST',
			cache:false,
			data:{
				'order_code' : order_code,
				'itemCode' : itemCode,
				'itemId' : itemId,
				'qty' : qty,
				'price' : price
			},
			success:function(rs) {
				if(isJson(rs)) {
					let ds = $.parseJSON(rs);
					ds.PriceLabel = addCommas(ds.Price);
					ds.LineTotalLabel = addCommas(ds.LineTotal);

					let source = $('#row-template').html();
					let output = $('#detail-table');

					render_append(source, ds, output);
					clearItem();
				}
				else {
					swal({
						title:'Error!',
						text:rs,
						type:'error'
					})
				}
			}
		})
	}
}


function removeRow(id, name) {
	var code = $('#code').val();
	swal({
		title: "คุณแน่ใจ ?",
		text: "ต้องการลบ "+name+" หรือไม่ ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: 'ใช่, ฉันต้องการลบ',
		cancelButtonText: 'ไม่ใช่',
		closeOnConfirm: false
		}, function(){
			$.ajax({
				url:HOME + 'remove_row',
				type:'POST',
				cache:false,
				data:{
					'id' : id,
					'order_code' : code
				},
				success:function(rs) {
					if(rs === 'success') {
						swal({
							title:'Deleted',
							type:'success',
							timer:1000
						});

						$('#row-'+id).remove();

						recalTotal();
					}
					else {
						swal({
							title:'Error!',
							text: rs,
							type:'error'
						});
					}
				}
			});
	});
}



function recalAmount(no) {
  var currentInput = removeCommas($('#disc-label-'+no).val());
  var val = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
	var price = $('#price-'+no).val();
	var qty = $('#line-qty-'+no).val();

	var disc = parseDiscount(val, price);

	if(disc.discountAmount < 0 || disc.discountAmount > price) {
		$('#disc-label-' + no).addClass('has-error');
		return false;
	}
	else {
		$('#disc-label-' + no).removeClass('has-error');
		$('#disc-amount-'+no).val(disc.discountAmount);
		$('#line-disc-amount-'+no).val(qty * disc.discountAmount);

		let vat_rate = parseDefault(parseFloat($('#vat-rate-'+no).val()), 0) * 0.01;

		let sellPrice = (price - disc.discountAmount);
		let sysSellPrice = $('#sysSellPrice-'+no).val();
		let vatAmount = (sellPrice * vat_rate);
		let vatTotal = (qty * vatAmount);
		let discDiff = getDiscDiff(sysSellPrice, sellPrice);
		let lineAmount = (qty * sellPrice);
		let lineLabel = lineAmount.toFixed(2);

		$('#sellPrice-'+no).val(sellPrice);
		$('#vat-amount-'+no).val(vatAmount);
		$('#vat-total-'+no).val(vatTotal);
		$('#disc-diff-'+no).val(discDiff);
		$('#line-total-'+no).val(lineAmount);
		$('#total-label-'+no).val(addCommas(lineLabel));

		recalTotal();
	}
}


function getDiscDiff(old_price, new_price) {
	let diff = old_price - new_price;

	if(diff > 0) {
		return diff/old_price * 0.01;
	}

	return 0;
}


function recalTotal() {
	var total = 0.00; //--- total amount after row discount
	var totalTaxAmount = 0.00;
	var df_rate = parseDefault(parseFloat($('#vat_rate').val()), 7); //---- 7%
	var taxRate = df_rate * 0.01;
	var rounding = parseDefault(parseFloat(removeCommas($('#roundDif').val())), 0);

	$('.line-num').each(function(){
		let no = $(this).val();
		let qty = parseDefault(parseFloat($('#line-qty-'+no).val()), 0);
		let price = parseDefault(parseFloat($('#price-'+no).val()), 0);
		let amount = parseDefault(parseFloat($('#line-total-'+no).val()), 0);
		let rate = parseDefault(parseFloat($('#vat-rate-'+no).val()), 0);


		if(qty > 0 && price > 0)
		{
			total += amount;
			if(rate > 0) {
				totalTaxAmount += amount;
			}
		}
	});

	//--- update bill discount
	var disc = parseDefault(parseFloat($('#discPrcnt').val()), 0);
	var billDiscAmount = total * (disc * 0.01);
	$('#discAmount').val(billDiscAmount);
	$('#discAmountLabel').val(addCommas(billDiscAmount.toFixed(2)));

	//---- bill discount amount
	var amountAfterDisc = total - billDiscAmount; //--- มูลค่าสินค้า หลังหักส่วนลด
	var amountBeforeDiscWithTax = totalTaxAmount //-- มูลค่าสินค้า เฉพาะที่มีภาษี
	//--- คำนวนภาษี หากมีส่วนลดท้ายบิล
	//--- เฉลี่ยส่วนลดออกให้ทุกรายการ โดยเอาส่วนลดท้ายบิล(จำนวนเงิน)/มูลค่าสินค้าก่อนส่วนลด
	//--- ได้มูลค่าส่วนลดท้ายบิลที่เฉลี่ยนแล้ว ต่อ บาท เช่น หารกันมาแล้ว ได้ 0.16 หมายถึงทุกๆ 1 บาท จะลดราคา 0.16 บาท
	var everageBillDisc = (total > 0 ? billDiscAmount/total : 0);

	//console.log(everageBillDisc);

	//--- นำผลลัพธ์ข้างบนมาคูณ กับ มูลค่าที่ต้องคิดภาษี (ตัวที่ไม่มีภาษีไม่เอามาคำนวณ)
	//--- จะได้มูลค่าส่วนลดที่ต้องไปลบออกจากมูลค่าสินค้าที่ต้องคิดภาษี
	var totalDiscTax = amountBeforeDiscWithTax * everageBillDisc;
	//console.log(amountBeforeDiscWithTax);
	var amountToPayTax = amountBeforeDiscWithTax - totalDiscTax;
	//console.log(amountToPayTax);
	var taxAmount = amountToPayTax * taxRate;
	var docTotal = amountAfterDisc + taxAmount + rounding;

	$('#totalAmount').val(total.toFixed(2));
	$('#totalAmountLabel').val(addCommas(total.toFixed(2)));
	$('#tax').val(taxAmount.toFixed(2));
	$('#taxLabel').val(addCommas(taxAmount.toFixed(2)));
	$('#docTotal').val(docTotal.toFixed(2));
	$('#docTotalLabel').val(addCommas(docTotal.toFixed(2)));
}


$('#discAmountLabel').focusout(function(){
	var total = parseDefault(parseFloat($('#totalAmount').val()), 0);
	var disc = parseDefault(parseFloat(removeCommas($(this).val())), 0);

	if(disc < 0 ) {
		disc = 0;
		$(this).val(0);
		$('#discAmount').val(0);
	}
	else if(disc > total) {
		disc = total;
		$(this).val(addCommas(total));
		$('#discAmount').val(total);
	}
	//--- convert amount to percent
	var discPrcnt = (total > 0 ? (disc / total) * 100 : 0);

	$('#discPrcnt').val(discPrcnt.toFixed(2));

	recalTotal();
})



$('#roundDif').keyup(function(){
	recalTotal();
})
