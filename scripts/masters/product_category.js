function addNew(){
  window.location.href = BASE_URL + 'masters/product_category/add_new';
}



function goBack(){
  window.location.href = BASE_URL + 'masters/product_category';
}


function getEdit(code){
  window.location.href = BASE_URL + 'masters/product_category/edit/'+code;
}


function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	})
}

function clearFilter(){
  goBack();
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
  goBack();
}
