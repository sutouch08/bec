function addNew(){
  window.location.href = HOME + 'add_new';
}



function goBack(){
  window.location.href = HOME;
}



function edit(code){
  window.location.href = HOME + 'edit/' + code;
}


function viewDetail(code){
  window.location.href = HOME + 'view_detail/'+code;
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




function toggleOnlyMe() {
	let option = parseDefault(parseInt($('#onlyMe').val()), 0);

	if(option == 1) {
		$('#onlyMe').val(0);
	}
	else {
		$('#onlyMe').val(1);
	}

	getSearch();
}
