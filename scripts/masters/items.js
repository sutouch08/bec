var HOME = BASE_URL + 'masters/items/';

function goBack(){
  window.location.href = HOME;
}


function getEdit(code){
	// $('#item-code').val(code);
	// $('#edit-form').submit();
  window.location.href = HOME + 'edit/'+code;
}

function sync() {
	load_in();

	setTimeout(function() {
		load_out();
		swal({
			title:'Success',
			type:'success',
			timer:1000
		});
	}, 1200);
}



function clearFilter(){
  goBack();
}


function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	})
}



function getDelete(code){
  swal({
    title:'Are sure ?',
    text:'ต้องการลบ ' + code + ' หรือไม่ ?',
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
		});
  })
}

function getSearch(){
  $('#searchForm').submit();
}
