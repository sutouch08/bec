function addNew(){
  window.location.href = BASE_URL + 'masters/customers/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'masters/customers';
}


function getEdit(){
  window.location.href = BASE_URL + 'masters/customers/edit/';
}


function getDelete(){
  swal({
    title:'Are sure ?',
    text:'ต้องการลบลูกค้าหรือไม่ ?',
    type:'warning',
    showCancelButton: true,
		confirmButtonColor: '#FA5858',
		confirmButtonText: 'ใช่, ฉันต้องการลบ',
		cancelButtonText: 'ยกเลิก',
		closeOnConfirm: false
  },function(){
    swal({
			title:'Deleted',
			type:'success',
			timer:1000
		})
  })
}




$('#date').datepicker();


function getSearch(){
  $('#searchForm').submit();
}



function syncData(){
  load_in();
	setTimeout(function(){
		load_out();

		swal({
			title:'Success',
			type:'success',
			timer:1000
		})
	}, 1500)
}
