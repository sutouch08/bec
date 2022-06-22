var HOME = BASE_URL + 'masters/products/';

function goBack() {
	window.location.href = HOME;
}


function getEdit(id) {
	window.location.href = HOME + 'edit/'+id;
}


function viewDetail(id) {
	window.location.href = HOME + 'view_detail/'+id;
}

$('#model').autocomplete({
	source:HOME + 'search_model',
	autoFocus:true,
	close:function() {
		let rs = $('#model').val();
		let arr = rs.split(' | ');

		if(arr.length == 2) {
			$('#model').val(arr[0]);
			$('#model_id').val(arr[1]);
		}
		else {
			$('#model').val('');
			$('#model_id').val('');
		}
	}
})

function checkEdit(){
	let id = $('#id').val();
	let code = $('#code').val();
	let model = $('#model_id').val();
	let brand = $('#brand').val();
	let category = $('#category').val();
	let type = $('#type').val();
	let cover = $('#is_cover').is(':checked') ? 1 : 0;

	load_in();
	$.ajax({
		url:HOME + 'update',
		type:'POST',
		cache:false,
		data:{
			"id" : id,
			"code" : code,
			"model" : model,
			"brand" : brand,
			"category" : category,
			"type" : type,
			"cover" : cover
		},
		success:function(rs) {
			load_out();
			if(rs === 'success') {
				swal({
					title:"Success",
					type:'success',
					timer:1000
				});

				setTimeout(function() {
					window.location.reload();
				}, 1200);
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


$('#price').focus(function(){
	$(this).select();
})

$('#cost').focus(function(){
	$(this).select();
})


function syncData() {
	load_in();

	$.ajax({
		url:HOME + 'sync_data',
		type:'GET',
		cache:false,
		success:function(rs) {
			load_out();
			if(rs === 'success') {
				swal({
					title:'Success',
					type:'success',
					timer:1000
				});

				setTimeout(function() {
					goBack();
				}, 1200);
			}
			else {
				swal({
					title:'Error!',
					text: rs,
					type:'error'
				})
			}
		}
	})
}


function changeImage() {
	$('#imageModal').modal('show');
}

function doUpload()
{
	var id = $('#id').val();
	var code = $('#code').val();
	var image	= $("#image")[0].files[0];

	if( image == '' ){
		swal('ข้อผิดพลาด', 'ไม่สามารถอ่านข้อมูลรูปภาพที่แนบได้ กรุณาแนบไฟล์ใหม่อีกครั้ง', 'error');
		return false;
	}


	$("#imageModal").modal('hide');

	var fd = new FormData();
	fd.append('image', $('input[type=file]')[0].files[0]);
	fd.append('code', code);
	fd.append('id', id);

	load_in();

	$.ajax({
		url: HOME + 'change_image',
		type:"POST",
		cache: "false",
		data: fd,
		processData:false,
		contentType: false,
		success: function(rs){
			load_out();
			var rs = $.trim(rs);
			if( rs == 'success')
			{
				swal({
					title : 'Success',
					type: 'success',
					timer: 1000
				});

				setTimeout(function(){
					window.location.reload();
				}, 1200);

			}
			else
			{
				swal("ข้อผิดพลาด", rs, "error");
			}
		},
		error:function(xhr, status, error) {
			load_out();
			swal({
				title:'Error!',
				text:"Error-"+xhr.status+": "+xhr.statusText,
				type:'error'
			})
		}
	});
}

function readURL(input)
{
	 if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#previewImg').html('<img id="previewImg" src="'+e.target.result+'" width="200px" alt="รูปสินค้า" />');
				}
				reader.readAsDataURL(input.files[0]);
		}
}

$("#image").change(function(){
	if($(this).val() != '')
	{
		var file 		= this.files[0];
		var name		= file.name;
		var type 		= file.type;
		var size		= file.size;
		if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' )
		{
			swal("รูปแบบไฟล์ไม่ถูกต้อง", "กรุณาเลือกไฟล์นามสกุล jpg, jpeg, png หรือ gif เท่านั้น", "error");
			$(this).val('');
			return false;
		}

		if( size > 2000000 )
		{
			swal("ขนาดไฟล์ใหญ่เกินไป", "ไฟล์แนบต้องมีขนาดไม่เกิน 2 MB", "error");
			$(this).val('');
			return false;
		}

		readURL(this);

		$("#btn-select-file").css("display", "none");
		$("#block-image").animate({opacity:1}, 1000);
	}
});


function removeFile()
{
	$("#previewImg").html('');
	$("#block-image").css("opacity","0");
	$("#btn-select-file").css('display', '');
	$("#image").val('');
}


function deleteImage()
{
	var code = $('#code').val();
  swal({
		title: "คุณแน่ใจ ?",
		text: "ต้องการลบรูปภาพ หรือไม่ ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#FA5858",
		confirmButtonText: 'ใช่, ฉันต้องการลบ',
		cancelButtonText: 'ยกเลิก',
		closeOnConfirm: false
		}, function(){
      $.ajax({
    		url: HOME + 'delete_image',
    		type:"POST",
        cache:"false",
        data:{
          "code" : code
        },
    		success: function(rs){
    			var rs = $.trim(rs);
    			if( rs == 'success' )
    			{
            swal({
              title:'Deleted',
              text:'ลบรูปภาพเรียบร้อยแล้ว',
              type:'success',
              timer:1000
            });

    				setTimeout(function(){
							window.location.reload();
						},1200)
    			}
    			else
    			{
    				swal({
							title:'Error!',
							text:rs,
							type:'error'
						})
    			}
    		},
				error: function(rs) {
					swal({
						title:'Error!',
						text:"Error-" + rs.status + ": "+rs.statusText,
						type:"error"
					})
				}
    	});
	});
}
