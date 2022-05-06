//--------------------------------------------------------------------------------------------------------
function listar_capa(fk_ud){
    $("#txt_fk_ud").val(fk_ud);
  	var parametros = {'op':'list','fk_ud':fk_ud}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_capacidad.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_capa").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_capa").html(response);
                  $("#ct_form_body_calo").html("");
                  $("#txt_fk_capacidad").val("");
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_capa(){
var fk_ud=$('#txt_fk_ud').val();
    if(fk_ud>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'new'}
        $.ajax({
              data:  parametros,
              cache: false,
              url:   'view/view_capacidad.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>NUEVO</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_capa(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_capa_descripcion").focus();	
              }
        });
    }else{
        msg_popup("<i uk-icon='check'></i> Seleccione una unidad didactica.");
    }
}



//--------------------------------------------------------------------------------------------------------
function validaForm_capa(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_capa_descripcion").val();
	
	var msg=$("#frm_msg_error");
	
	if(a=="" || a==null){	
		$("#txt_capa_descripcion").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_capa();
	}else if(op_frm==2){
		form_actualizar_capa()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_capa(){	
		var fk_ud=$('#txt_fk_ud').val();
		var capa_descripcion=$('#txt_capa_descripcion').val();
		var parametros = {'op':'insert','fk_ud':fk_ud,
						'capa_descripcion':capa_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_capacidad.php',
		  type: 'post',
		  beforeSend: function () {
				 
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
				listar_capa(fk_ud);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_capa(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_capacidad.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_capa(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_capa_descripcion").focus();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}

//--------------------------------------------------------------------------------------------------------
function form_actualizar_capa(){
	var pk=$("#txt_capa_pk").val();
	
		var fk_ud=$('#txt_fk_ud').val();
		var capa_descripcion=$('#txt_capa_descripcion').val();
		var parametros =  {'op':'update','pk':pk,'fk_ud':fk_ud,
						'capa_descripcion':capa_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_capacidad.php',
		  type:  'post',
		  beforeSend: function () {
				
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
				  listar_capa(fk_ud);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_eliminar_capa(pk){
    var fk_ud=$('#txt_fk_ud').val();
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_capacidad.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_capa(fk_ud);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}
