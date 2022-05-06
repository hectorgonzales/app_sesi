
//--------------------------------------------------------------------------------------------------------
function listar_modu(){
    var fk_carrera=$('#txt_fk_carrera').val();
  	var parametros = {'op':'ver_modulos','fk_carrera':fk_carrera}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_modulo.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
		  }
  	});
}

//-------------------------------------------------------------------------------------------------------	
function main_competencias(pk_modulo){
 var fk_carrera=$('#txt_fk_carrera').val();
 var parametros = {'op':'main_competencias','pk_modulo':pk_modulo,'fk_carrera':fk_carrera}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   'view/view_modulo.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_form").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
	  },
	  success: function(response){
		$("#ct_form").html(response);
          listar_coes(pk_modulo);
          listar_coem(pk_modulo);

	  }
  });
}

//-------------------------------------------------------------------------------------------------------	
function main_ud(fk_modulo,competencia){
 var parametros = {'op':'main_ud','fk_modulo':fk_modulo,'competencia':competencia}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   'view/view_modulo.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_form").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
	  },
	  success: function(response){
		$("#ct_form").html(response);
          listar_ud(fk_modulo,competencia);
          //listar_coem(pk_modulo);

	  }
  });
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_modu(){
	$("#frm_box_cuerpo").css('width','50%');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_modulo.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>NUEVO</h4>");
			c.html(response);
			p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_modu(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
			UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
			$("#txt_modu_nombre").focus();	
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function validaForm_modu(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_modu_nombre").val();
	
	var msg=$("#frm_msg_error");
	
	if(a=="" || a==null){	
		$("#txt_modu_nombre").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_modu();
	}else if(op_frm==2){
		form_actualizar_modu()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_modu(){	
		var fk_carrera=$('#txt_fk_carrera').val();
		var modu_nombre=$('#txt_modu_nombre').val();
		var parametros = {'op':'insert','fk_carrera':fk_carrera,
						'modu_nombre':modu_nombre}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_modulo.php',
		  type: 'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
              UIkit.modal("#frm_box").hide();
			  listar_modu();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_modu(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_modulo.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_modu(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_modu_nombre").focus();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}



//--------------------------------------------------------------------------------------------------------
function form_actualizar_modu(){
	var pk=$("#txt_modu_pk").val();
	
		var fk_carrera=$('#txt_fk_carrera').val();
		var modu_nombre=$('#txt_modu_nombre').val();
		var parametros =  {'op':'update','pk':pk,'fk_carrera':fk_carrera,
						'modu_nombre':modu_nombre}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_modulo.php',
		  type:  'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
              UIkit.modal("#frm_box").hide();
			  listar_modu();
		  }
  	});
}
//--------------------------------------------------------------------------------------------------------
function form_eliminar_modu(pk){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_modulo.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_modu();
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}