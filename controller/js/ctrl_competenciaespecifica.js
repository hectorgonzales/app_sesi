
//--------------------------------------------------------------------------------------------------------
function listar_coes(pk_modulo){
  	var parametros = {'op':'list','pk_modulo':pk_modulo}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_competenciaespecifica.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_coes").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_coes").html(response);
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function form_nuevo_coes(){
	$("#frm_box_cuerpo").css('width','50%');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_competenciaespecifica.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>NUEVO</h4>");
			c.html(response);
			p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_coes(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
			UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); // { bgClose: false, escClose: false, modal: false, keyboard:false}
			$("#txt_coes_descripcion").focus();	
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function validaForm_coes(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_coes_descripcion").val();
	
	var msg=$("#frm_msg_error2");
	
	if(a=="" || a==null){	
		$("#txt_coes_descripcion").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_coes();
	}else if(op_frm==2){
		form_actualizar_coes()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_coes(){	
		var fk_modulo=$('#txt_fk_modulo').val();
		var coes_descripcion=$('#txt_coes_descripcion').val();
		var parametros = {'op':'insert','fk_modulo':fk_modulo,
						'coes_descripcion':coes_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_competenciaespecifica.php',
		  type: 'post',
		  beforeSend: function () {
				 
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
				listar_coes(fk_modulo);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_coes(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_competenciaespecifica.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_coes(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_coes_descripcion").focus();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}



//--------------------------------------------------------------------------------------------------------
function form_actualizar_coes(){
	var pk=$("#txt_coes_pk").val();
	
		var fk_modulo=$('#txt_fk_modulo').val();
		var coes_descripcion=$('#txt_coes_descripcion').val();
		var parametros =  {'op':'update','pk':pk,'fk_modulo':fk_modulo,
						'coes_descripcion':coes_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_competenciaespecifica.php',
		  type:  'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
				  UIkit.modal("#frm_box").hide();
				 listar_coes(fk_modulo);
		  }
  	});
}
//--------------------------------------------------------------------------------------------------------
function form_eliminar_coes(pk){
    var fk_modulo=$('#txt_fk_modulo').val();
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_competenciaespecifica.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_coes(fk_modulo);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}

