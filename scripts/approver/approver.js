var HOME = BASE_URL + 'users/approver/';

function goBack() {
	window.location.href = HOME;
}


function addNew() {
	window.location.href = HOME + "add_new";
}


function getEdit(id) {
	window.location.href = HOME + "edit/"+id;
}


function save() {
	swal({
		title:'Success',
		type:'success',
		timer:1000
	});
}

function getDelete(id, code) {
	swal({
		title:'คุณแน่ใจ ?',
		text:'ต้องการลบ '+code+' หรือไม่ ?',
		type:'warning',
		showCancelButton:true,
		confirmButtonColor:'#DD6B55',
		confirmButtonText:'ใช่, ฉันต้องการลบ',
		cancelButtonText:'ยกเลิก',
		closeOnConfirm:false
	}, function() {
			swal({
				title:'Deleted',
				type:'success',
				timer:1000
			});
	});
}


function getSearch() {
	$('#searchForm').submit();
}

function clearFilter() {
	$.get(HOME + "clear_filter", function() {
		goBack();
	})
}



function update_name() {
	var data = $('#uname option:selected').text();
	if(data == 'Select') {
		$('#name').val('');
	}
	else {
		ds = data.split(' : ');
		$('#name').val(ds[1]);
	}
}

$('.search-box').keyup(function(e) {
	if(e.keyCode === 13) {
		getSearch();
	}
})
