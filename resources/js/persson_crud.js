//==============NAV ALL================================
//exec func dinamic 2 formas
	//window["form_modificar_"+p]();
	//eval("form_modificar_"+p+"()");
//exec button
//$(tb+" td").on("click", buscarColumna);

var url_p = getParams('p');
$("#frm_bt_lista_"+url_p).click(function(){
	window["main_"+url_p]();
});


$("#frm_bt_nuevo_"+url_p).click(function(){
  window["form_nuevo_"+url_p]();
});

$("#frm_bt_modificar_"+url_p).click(function(){
	var pk=$("#txt_pk_hidden").val();
	if(pk>0){
  		window["form_modificar_"+url_p]();
	}else{
		msg_popup("<i uk-icon='warning'></i> Seleccione un registro.","danger");
	}		

});

$("#frm_bt_eliminar_"+url_p).click(function(){
	var pk=$("#txt_pk_hidden").val();
	if(pk>0){
		window["form_eliminar_"+url_p]();
	}else{
		msg_popup("<i uk-icon='warning'></i> Seleccione un registro.","danger");
	}		

});

//==============END==========================
