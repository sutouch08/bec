
function updateConfig(formName)
{
	load_in();
	var formData = $("#"+formName).serialize();
	$.ajax({
		url: HOME + "update_config",
		type:"POST",
    cache:"false",
    data: formData,
		success: function(rs){
			load_out();
      rs = $.trim(rs);
      if(rs == 'success'){
        swal({
          title:'Updated',
          type:'success',
          timer:1000
        });
      }else{
        swal('Error!', rs, 'error');
      }
		}
	});
}



function openSystem()
{
	$("#closed").val(0);
	$("#btn-close").removeClass('btn-danger');
	$('#btn-freze').removeClass('btn-warning');
	$("#btn-open").addClass('btn-success');
}



function closeSystem()
{
	$("#closed").val(1);
	$("#btn-open").removeClass('btn-success');
	$('#btn-freze').removeClass('btn-warning');
	$("#btn-close").addClass('btn-danger');
}


function frezeSystem()
{
	$("#closed").val(2);
	$("#btn-open").removeClass('btn-success');
	$("#btn-close").removeClass('btn-danger');
	$('#btn-freze').addClass('btn-warning');
}


function toggleStrongPWD(option) {
	$('#use-strong-pwd').val(option);

	if(option == 1) {
		$('#btn-strong-on').addClass('btn-primary');
		$('#btn-strong-off').removeClass('btn-primary');
	}
	else {
		$('#btn-strong-on').removeClass('btn-primary');
		$('#btn-strong-off').addClass('btn-primary');
	}
}


function changeURL(tab)
{
	var url = HOME + 'index/'+tab;
	var stObj = { stage: 'stage' };
	window.history.pushState(stObj, 'setting', url);
}
