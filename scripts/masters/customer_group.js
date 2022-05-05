function addNew(){
  window.location.href = BASE_URL + 'masters/customer_group/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'masters/customer_group';
}


function getEdit(code){
  window.location.href = BASE_URL + 'masters/customer_group/edit/'+code;
}


function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	});

	setTimeout(function() {
		window.location.reload();
	}, 1200)
}


function clearFilter(){
  var url = BASE_URL + 'masters/customer_group/clear_filter';
  var page = BASE_URL + 'masters/customer_group';
  $.get(url, function(rs){
    window.location.href = page;
  });
}


function getDelete(code, name){
  swal({
    title:'Are sure ?',
    text:'ต้องการลบ ' + name + ' หรือไม่ ?',
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



function getSearch(){
  $('#searchForm').submit();
}
