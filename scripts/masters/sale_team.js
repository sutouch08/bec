function addNew(){
  window.location.href = BASE_URL + 'masters/sales_team/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'masters/sales_team';
}


function getEdit(id){
  window.location.href = BASE_URL + 'masters/sales_team/edit/'+id;
}

function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	})

	setTimeout(function() {
		window.location.reload();
	}, 1200)
}


function getDelete(code, name){
  swal({
    title:'Are sure ?',
    text:'ต้องการลบ '+name+' หรือไม่ ?',
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


function clearFilter() {
	$.get(BASE_URL + 'masters/sales_team/clear_filter', function() {
		goBack();
	})
}

$('#date').datepicker();


function getSearch(){
  $('#searchForm').submit();
}
