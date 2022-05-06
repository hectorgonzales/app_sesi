//--------------------------------------------------------------------------------------------------------
function listar_ud(fk_modulo,competencia){

  	var parametros = {'op':'list','fk_modulo':fk_modulo,'competencia':competencia}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_ud.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_ud").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_ud").html(response);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_ud(){
	$("#frm_box_cuerpo").css('width','50%');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
  	var parametros = {'op':'new'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_ud.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>NUEVO</h4>");
			c.html(response);
			p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_ud(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
			UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
			$("#txt_ud_nombre").focus();	
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function validaForm_ud(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_ud_nombre").val();
	
	var msg=$("#frm_msg_error2");
	
	if(a=="" || a==null){	
		$("#txt_ud_nombre").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_ud();
	}else if(op_frm==2){
		form_actualizar_ud()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_ud(){	
		var fk_carrera=$('#txt_fk_carrera').val();
        var fk_modulo=$('#txt_fk_modulo').val();
		var ud_tipo=$('#txt_ud_tipo').val();
		var ud_nombre=$('#txt_ud_nombre').val();
		var ud_semestre=$('#txt_ud_semestre').val();
        var ud_horas=$('#txt_ud_horas').val();
		var parametros = {'op':'insert','fk_carrera':fk_carrera,'fk_modulo':fk_modulo,
						'ud_tipo':ud_tipo,
						'ud_nombre':ud_nombre,
						'ud_semestre':ud_semestre,
                        'ud_horas':ud_horas}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_ud.php',
		  type: 'post',
		  beforeSend: function () {
				 
		  },
		  success:  function (response) {
                UIkit.modal("#frm_box").hide();
                listar_ud(fk_modulo,ud_tipo);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_ud(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_ud.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_ud(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_ud_nombre").focus();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}



//--------------------------------------------------------------------------------------------------------
function form_actualizar_ud(){
	var pk=$("#txt_ud_pk").val();
        var fk_carrera=$('#txt_fk_carrera').val();
        var fk_modulo=$('#txt_fk_modulo').val();
		var ud_tipo=$('#txt_ud_tipo').val();
		var ud_nombre=$('#txt_ud_nombre').val();
        var ud_semestre=$('#txt_ud_semestre').val();
        var ud_horas=$('#txt_ud_horas').val();
		var parametros = {'op':'update','pk':pk,'fk_carrera':fk_carrera,
                        'fk_modulo':fk_modulo,
						'ud_tipo':ud_tipo,
						'ud_nombre':ud_nombre,
						'ud_semestre':ud_semestre,
                        'ud_horas':ud_horas}

  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_ud.php',
		  type:  'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
				  UIkit.modal("#frm_box").hide();
				 listar_ud(fk_modulo,ud_tipo);
		  }
  	});
}
//--------------------------------------------------------------------------------------------------------
function form_eliminar_ud(pk){
    var fk_modulo=$('#txt_fk_modulo').val();
    var ud_tipo=$('#txt_ud_tipo').val();
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_ud.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_ud(fk_modulo,ud_tipo);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}

