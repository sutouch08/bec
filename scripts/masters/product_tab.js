var HOME = BASE_URL + 'masters/product_tab/';

function goBack(){
  window.location.href = HOME;
}

function addNew(){
  window.location.href = HOME + 'add_new';
}



function getEdit(id){
  window.location.href = HOME + 'edit/'+id;
}


function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	})
}

function clearFilter(){
  $.get(HOME + 'clear_filter', function(){
    goBack();
  });
}


function getDelete(id, name){
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
		});

		$('#row-'+id).remove();

  })
}



function getSearch(){
  $('#searchForm').submit();
}
