//--------------------------------------------------------------------------------------------------------
function listar_seac(momento){
  	var parametros = {'op':'list','momento':momento}
    var ct="";
    if(momento=="inicio"){
        ct=$("#ct_list_seac_inicio");
    }else if(momento=="desarrollo"){
        ct=$("#ct_list_seac_desarrollo");
    }else if(momento=="cierre"){
        ct=$("#ct_list_seac_cierre");
    }
  	
    $.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_sesionactividad.php',
		  type: 'post',
		  beforeSend: function () {
				  ct.html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  ct.html(response);
                  //tb_seleccionar_fila_lista('#tb_lista',1);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_seac(fk_sesion,momento){
	$("#frm_box_cuerpo").css('width','70%');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
  	var parametros = {'op':'new','fk_sesion':fk_sesion,'momento':momento}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_sesionactividad.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>NUEVO</h4>");
			c.html(response);
			p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_seac(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
			UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
            loadTinyMCEEditor_docs('#txt_seac_actividad');
            $("#txt_seac_actividad").focus();
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function validaForm_seac(op_frm) {  //1 ADD 2 EDIT
	var a=tinyMCE.get("txt_seac_actividad").getContent();
	
	var msg=$("#frm_msg_error");
	
	if(a=="" || a==null){	
		$("#txt_seac_actividad").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_seac();
	}else if(op_frm==2){
		form_actualizar_seac()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_seac(){	
		var fk_sesion=$('#txt_fk_sesion').val();
		var seac_momento=$('#txt_seac_momento').val();
		//var seac_actividad=$('#txt_seac_actividad').val();
        var seac_actividad=tinyMCE.get("txt_seac_actividad").getContent();
		var seac_recurso_icono=$('#txt_seac_recurso').val();
		var seac_recurso=$('#txt_seac_recurso option:selected').text();
		var seac_tiempo=$('#txt_seac_tiempo').val();
		var parametros = {'op':'insert','fk_sesion':fk_sesion,
						'seac_momento':seac_momento,
						'seac_actividad':seac_actividad,
						'seac_recurso':seac_recurso,
						'seac_recurso_icono':seac_recurso_icono,
						'seac_tiempo':seac_tiempo}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_sesionactividad.php',
		  type: 'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
                listar_seac(seac_momento);
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function form_modificar_seac(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','70%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_sesionactividad.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_seac(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                loadTinyMCEEditor_docs('#txt_seac_actividad');
                $("#txt_seac_actividad").select();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}


//--------------------------------------------------------------------------------------------------------
function form_actualizar_seac(){
	var pk=$("#txt_seac_pk").val();
	
		var fk_sesion=$('#txt_fk_sesion').val();
		var seac_momento=$('#txt_seac_momento').val();
		//var seac_actividad=$('#txt_seac_actividad').val();
        var seac_actividad=tinyMCE.get("txt_seac_actividad").getContent();
		var seac_recurso_icono=$('#txt_seac_recurso').val();
		var seac_recurso=$('#txt_seac_recurso option:selected').text();
		var seac_tiempo=$('#txt_seac_tiempo').val();
		var parametros =  {'op':'update','pk':pk,'fk_sesion':fk_sesion,
						'seac_momento':seac_momento,
						'seac_actividad':seac_actividad,
						'seac_recurso':seac_recurso,
						'seac_recurso_icono':seac_recurso_icono,
						'seac_tiempo':seac_tiempo}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_sesionactividad.php',
		  type:  'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
                listar_seac(seac_momento);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_eliminar_seac(pk){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_sesionactividad.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					quitar_fila_lista(pk);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}
