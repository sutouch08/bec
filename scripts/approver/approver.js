function goBack() {
	window.location.href = HOME;
}


function addNew() {
	window.location.href = HOME + "add_new";
}


function getEdit(id) {
	window.location.href = HOME + "edit/"+id;
}


function saveAdd() {
	const user_id = $('#user').val();
	const team_id = $('#team_id').val();
	const disc = parseDefault(parseFloat($('#disc').val()), 0.00);
	const status = $('#status').is(':checked') ? 1 : 0;

	if(user_id == "") {
		set_error($('#user'), $('#user-error'), "Required!");
		return false;
	}
	else {
		clear_error($('#user'), $('#user-error'));
	}

	if(team_id == "") {
		set_error($('#team_id'), $('#team-error'), "Required!");
		return false;
	}
	else {
		clear_error($('#team_id'), $('#team-error'));
	}

	if(disc <= 0 || disc > 100) {
		set_error($('#disc'), $('#disc-error'), "Discount must in range 0.1 - 100");
		return false;
	}
	else {
		clear_error($('#disc'), $('#disc-error'));
	}

	load_in();

	$.ajax({
		url:HOME + 'add',
		type:'POST',
		cache:false,
		data:{
			'user_id' : user_id,
			'team_id' : team_id,
			'disc' : disc,
			'status' : status
		},
		success:function(rs) {
			load_out();

			rs = $.trim(rs);

			if(rs === 'success') {
				swal({
					title:'Success',
					type:'success',
					timer:1000
				});

				setTimeout(function() {
					addNew()
				}, 1500);
			}
			else {
				swal({
					title:'Error!',
					text: rs,
					type:'error'
				});
			}
		}
	});
}



function update() {
	const id = $('#id').val();
	const user_id = $('#user').val();
	const team_id = $('#team_id').val();
	const disc = parseDefault(parseFloat($('#disc').val()), 0.00);
	const status = $('#status').is(':checked') ? 1 : 0;

	if(user_id == "") {
		set_error($('#user'), $('#user-error'), "Required!");
		return false;
	}
	else {
		clear_error($('#user'), $('#user-error'));
	}

	if(team_id == "") {
		set_error($('#team_id'), $('#team-error'), "Required!");
		return false;
	}
	else {
		clear_error($('#team_id'), $('#team-error'));
	}

	if(disc <= 0 || disc > 100) {
		set_error($('#disc'), $('#disc-error'), "Discount must in range 0.1 - 100");
		return false;
	}
	else {
		clear_error($('#disc'), $('#disc-error'));
	}

	load_in();

	$.ajax({
		url:HOME + 'update',
		type:'POST',
		cache:false,
		data:{
			'id' : id,
			'user_id' : user_id,
			'team_id' : team_id,
			'disc' : disc,
			'status' : status
		},
		success:function(rs) {
			load_out();

			rs = $.trim(rs);

			if(rs === 'success') {
				swal({
					title:'Success',
					type:'success',
					timer:1000
				});
			}
			else {
				swal({
					title:'Error!',
					text: rs,
					type:'error'
				});
			}
		}
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
			$.ajax({
				url:HOME + 'delete',
				type:'POST',
				cache:false,
				data:{
					'id' : id
				},
				success:function(rs) {
					if(rs === 'success') {
						swal({
							title:'Deleted',
							type:'success',
							timer:1000
						});

						setTimeout(function() {
							goBack();
						}, 1500);
					}
					else {
						swal({
							title:'Error!',
							text: rs,
							type:'error'
						});
					}
				}
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
	const user_id = $('#user').val();
	const data = $('#user option:selected').text();
	if(user_id == "") {
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
