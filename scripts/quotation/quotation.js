function addNew(){
  window.location.href = BASE_URL + 'orders/quotation/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'orders/quotation';
}



function editDetail(){
  window.location.href = BASE_URL + 'orders/quotation/edit_detail/';
}


function viewDetail(option){
  window.location.href = BASE_URL + 'orders/quotation/view_detail/'+option;
}


function cancleOrder(){
	swal({
		title: "คุณแน่ใจ ?",
		text: "ต้องการยกเลิกออเดอร์หรือไม่ ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: 'ใช่, ฉันต้องการยกเลิก',
		cancelButtonText: 'ไม่ใช่',
		closeOnConfirm: false
		}, function(){
			swal({ title: 'Success', type: 'success', timer: 1000 });
	});
}


function getSearch(){
  $('#searchForm').submit();
}


$('.search').keyup(function(e){
  if(e.keyCode == 13){
    getSearch();
  }
});


$("#fromDate").datepicker({
	dateFormat: 'dd-mm-yy',
	onClose: function(ds){
		$("#toDate").datepicker("option", "minDate", ds);
	}
});

$("#toDate").datepicker({
	dateFormat: 'dd-mm-yy',
	onClose: function(ds){
		$("#fromDate").datepicker("option", "maxDate", ds);
	}
});


$('#date').datepicker({
	dateFormat: 'dd-mm-yy'
});


var customer = [
	'CL-001 ** ร้านเฟอร์นิเจอร์' ,
	'CL-002 ** บริษัท โฮม โปรดักส์ เซ็นเตอร์ จำกัด',
	'CL-003 ** บริษัท สยามโกลบอลเฮ้าส์ จำกัด',
	'CL-004 ** บริษัท ซีอาร์ซี ไทวัสดุ จำกัด'
];

$('#customer_code').autocomplete({
	source:customer,
	autoFocus:true,
	close:function() {
		let cs = $(this).val();
		let arr = cs.split(' ** ');

		if(arr.length == 2) {
			$(this).val(arr[0]);
			$('#customer_name').val(arr[1]);
		}
		else {
			$(this).val('');
			$('#customer_name').val('');
		}
	}
})
