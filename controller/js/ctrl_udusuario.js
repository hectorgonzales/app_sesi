
//-------------------------------------------------------------------------------------------------------	
function main_udus(fk_ud_usuario){
 var parametros = {'op':'main'}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   'view/view_udusuario.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_form").html("Procesando...");
	  },
	  success: function(response){
		$("#ct_form").html(response);
		listar_udus(fk_ud_usuario);

	  }
  });
}
//--------------------------------------------------------------------------------------------------------
function listar_udus(fk_ud_usuario='0'){
  	var parametros = {'op':'list'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_udusuario.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body").html(response);
                  tb_seleccionar_fila_lista('#tb_lista',1);
                  hacer_clic('#fila' + fk_ud_usuario);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function listar_uds(fk_carrera){
  	var parametros = {'op':'listar_uds','fk_carrera':fk_carrera}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_udusuario.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_uds").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_uds").html(response);
                  tb_seleccionar_fila_lista('#tb_lista2',2);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_udus(){
	$("#frm_box_cuerpo").css('width','50%');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_udusuario.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>NUEVO</h4>");
			c.html(response);
			p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_udus(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
			UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
				
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function validaForm_udus(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_fk_ud_2").val();
	
	var msg=$("#frm_msg_error2");
	
	if(a=="" || a==null){	
		msg.html("<i uk-icon='warning'></i> Debe seleccionar una Unidad Didactica.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_udus();
	}else if(op_frm==2){
		form_actualizar_udus()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_udus(){	
		var fk_ud=$('#txt_fk_ud_2').val();
		var parametros = {'op':'insert',
						'fk_ud':fk_ud}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_udusuario.php',
		  type: 'post',
		  beforeSend: function () {
				 $("#ct_form_body").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  UIkit.modal("#frm_box").hide();
				 listar_udus();
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function form_eliminar_udus(pk){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_udusuario.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_udus();
                    listar_sesi();
                    $('#txt_fk_ud').val('');
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}

