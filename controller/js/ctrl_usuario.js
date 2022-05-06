
//-------------------------------------------------------------------------------------------------------	
function main_usua(){
 var parametros = {'op':'main'}
  $.ajax({
	  data:  parametros,
	  cache: false,
	  url:   'view/view_usuario.php',
	  type:  'post',
	  beforeSend: function () {
		$("#ct_form").html("Procesando...");
	  },
	  success: function(response){
		$("#ct_form").html(response);
		listar_usua();  
	  }
  });
}
//--------------------------------------------------------------------------------------------------------
function listar_usua(){
	var txt_campo_buscar=$('#box_txt_buscar_campo').val();
	var txt_buscar=$('#box_txt_buscar').val();

  	var parametros = {'op':'list','campo':txt_campo_buscar,'txt':txt_buscar}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_usuario.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body").html("<div class=\"uk-text-center uk-text-primary uk-margin-top\"><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body").html(response);
                  tb_seleccionar_fila_lista('#tb_lista',1);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_usua(){
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_usuario.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#ct_form").html("<div class=\"uk-text-center uk-text-primary uk-margin-top\"><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
				  $("#txt_usua_usuario").focus();				  
		  }
  	});
}

//-------------------------------BUSCAR SI EXISTE----------------------------------------------------------------------
function buscar_si_existe(login){
	var existe=0;
	var parametros = {'op':'buscar_si_existe','login':login}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'controller/ctrl_usuario.php',
		  type:  'post',
		  async: false, 
		  beforeSend: function () {	 
		  },
		  success: function (response) {
			existe=response.trim();
		  }
  	});
	
	return existe;
}

//--------------------------------------------------------------------------------------------------------
function validaForm_usua(op_frm) {  //1 ADD 2 EDIT
	var user=$("#txt_usua_usuario").val();
	var login=$("#txt_usua_login").val();
	var pass1=$("#txt_pass1").val();
	var pass2=$("#txt_pass2").val();
	
	var msg=$("#frm_msg_error");
	
	if(user=="" || user==null){	
		$("#txt_usua_usuario").focus();
		msg.html("Debe ingresar nombre y apellidos del usuario.");		
		msg.show();		
		return false;
	}
	if(login=="" || login==null){
		$("#txt_usua_login").focus();
		msg.html("Debe ingresar Login, elija otro.");		
		msg.show();		
		return false;
	}
	
	if(op_frm==1){
		var exi=buscar_si_existe(login).trim();
		if(exi==1){
			$("#txt_usua_login").focus(); 
			msg.html("El login <b>"+login+"</b> ya existe, elija otro.");		
			msg.show();		
			return false;		
		}
	}
		
	if(pass1=="" || pass1==null){
		$("#txt_pass1").focus(); 
		msg.html("Debe ingresar password.");		
		msg.show();		
		return false;
	}
	if(pass2=="" || pass2==null){
		$("#txt_pass2").focus(); 
		msg.html("Debe ingresar password.");		
		msg.show();		
		return false;
	}
	if(pass1!=pass2){
		$("#txt_pass2").focus(); 
		msg.html("No coinciden los password.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_usua();
	}else if(op_frm==2){
		form_actualizar_usua()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_usua(){	
	//var usua_caja_nombre=$('#cb_usua_caja_fk option:selected').text();
	var usua_tipo=$('#cb_usua_tipo').val();
	var usua_usuario=$('#txt_usua_usuario').val().toUpperCase();;
	var usua_login=$('#txt_usua_login').val();
	var usua_password=$('#txt_pass1').val();
	var usua_estado=$('#rb_activo').prop('checked');
	
	var usua_privilegios = [];
        $('#lst_privilegios input[type="checkbox"]:checked').each(function () {
                usua_privilegios.push($(this).val());
        });

  	var parametros = {'op':'insert','usua_usuario':usua_usuario,'usua_login':usua_login,'usua_password':usua_password,'usua_estado':usua_estado,'usua_tipo':usua_tipo,'usua_privilegios':usua_privilegios}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_usuario.php',
		  type: 'post',
		  beforeSend: function () {
				 $("#ct_form_body").html("<div class=\"uk-text-center uk-text-primary uk-margin-top\"><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				main_usua();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_usua(){
	var pk=$("#txt_pk_hidden").val();
  	var parametros = {'op':'edit','pk':pk}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_usuario.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#ct_form").html("<div class=\"uk-text-center uk-text-primary uk-margin-top\"><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
				  //$("#campo").focus();	
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_actualizar_usua(){
	var pk=$("#txt_usuario_pk").val();
	var usua_tipo=$('#cb_usua_tipo').val();
	var usua_usuario=$('#txt_usua_usuario').val().toUpperCase();;
	var usua_login=$('#txt_usua_login').val();
	var usua_password=$('#txt_pass1').val();
	var usua_estado=$('#rb_activo').prop('checked');

	var usua_privilegios = [];
        $('#lst_privilegios input[type="checkbox"]:checked').each(function () {
                usua_privilegios .push($(this).val());
        });		
	
  	var parametros =  {'op':'update','pk':pk,'usua_usuario':usua_usuario,'usua_login':usua_login,'usua_password':usua_password,'usua_estado':usua_estado,'usua_tipo':usua_tipo,'usua_privilegios':usua_privilegios}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_usuario.php',
		  type:  'post',
		  beforeSend: function () {
				$("#ct_form_body").html("<div class=\"uk-text-center uk-text-primary uk-margin-top\"><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  main_usua();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_eliminar_usua(){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
    	var pk=$("#txt_pk_hidden").val();
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_usuario.php',
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


