
function goBack(){
  window.location.href = HOME;
}


function addNew(){
  window.location.href = HOME + 'add_new/';
}


function goEdit(id){
  window.location.href = HOME + 'edit/'+id;
}


function viewDetail(id){
	//--- properties for print
	var prop 			= "width=800, height=900. left="+center+", scrollbars=yes";
	var center    = ($(document).width() - 800)/2;

	var target  = HOME + 'view_rule_detail/'+id;
	window.open(target, '_blank', prop);
}
