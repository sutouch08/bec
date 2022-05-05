function addNew(){
  window.location.href = BASE_URL + 'masters/customer_area/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'masters/customer_area';
}


function getEdit(code){
  window.location.href = BASE_URL + 'masters/customer_area/edit/'+code;
}


function clearFilter(){
  var url = BASE_URL + 'masters/customer_area/clear_filter';
  var page = BASE_URL + 'masters/customer_area';
  $.get(url, function(rs){
    window.location.href = page;
  });
}

function save() {
		swal({
			title:'Success',
			type:'success',
			timer: 1000
		})
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
