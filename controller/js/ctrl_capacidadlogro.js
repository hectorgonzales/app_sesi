//--------------------------------------------------------------------------------------------------------
function listar_calo(fk_capacidad){
    $("#txt_fk_capacidad").val(fk_capacidad);
  	var parametros = {'op':'list','fk_capacidad':fk_capacidad}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_capacidadlogro.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_calo").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_calo").html(response);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_nuevo_calo(){
var fk_capacidad=$("#txt_fk_capacidad").val();
    if(fk_capacidad>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'new'}
        $.ajax({
              data:  parametros,
              cache: false,
              url:   'view/view_capacidadlogro.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>NUEVO</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_calo(1)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_calo_descripcion").focus();	
              }
        });
    }else{
        msg_popup("<i uk-icon='check'></i> Seleccione una capacidad.");
    }
}

//--------------------------------------------------------------------------------------------------------
function validaForm_calo(op_frm) {  //1 ADD 2 EDIT
	var a=$("#txt_calo_descripcion").val();
	
	var msg=$("#frm_msg_error");
	
	if(a=="" || a==null){	
		$("#txt_calo_descripcion").focus();
		msg.html("<i uk-icon='warning'></i> Debe ingresar datos.");		
		msg.show();		
		return false;
	}
		
		msg.hide();	
		
	if(op_frm==1){
		form_insertar_calo();
	}else if(op_frm==2){
		form_actualizar_calo()
	}
	return true;
}

//--------------------------------------------------------------------------------------------------------
function form_insertar_calo(){	
		var fk_capacidad=$('#txt_fk_capacidad').val();
		var calo_descripcion=$('#txt_calo_descripcion').val();
		var parametros = {'op':'insert','fk_capacidad':fk_capacidad,
						'calo_descripcion':calo_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:  'controller/ctrl_capacidadlogro.php',
		  type: 'post',
		  beforeSend: function () {
				 
		  },
		  success:  function (response) {
				  UIkit.modal("#frm_box").hide();
				 listar_calo(fk_capacidad);
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_modificar_calo(pk){
    if(pk>0){
        $("#frm_box_cuerpo").css('width','50%');	
        var t=$("#frm_box_header")
        var c=$("#frm_box_centro")
        var p=$("#frm_box_foot")
        var parametros = {'op':'edit','pk':pk}
        $.ajax({
              data:  parametros,
              cache: false,
              url:  'controller/ctrl_capacidadlogro.php',
              type:  'post',
              beforeSend: function () {	 
              },
              success:  function (response) {
                t.html("<h4>MODIFICAR</h4>");
                c.html(response);
                p.html("<span uk-alert class='uk-alert-danger uk-margin-remove uk-padding-remove fs10' style='display:none' id='frm_msg_error2'></span> <button type='button'class='uk-button uk-modal-close'><i uk-icon='reply'></i> &nbsp; <span class='uk-visible@s'>Cancelar</span></button>  <button type='button' value='Submit' onclick='validaForm_calo(2)' class='uk-button uk-button-primary'><i uk-icon='check'></i> &nbsp; Aceptar</button>");
                UIkit.modal('#frm_box', {center: true,'bgClose': false}).show(); 
                $("#txt_calo_descripcion").focus();	
              }
        });
    }else{
       msg_popup("<i uk-icon='check'></i> Seleccione un registro."); 
    }
}


//--------------------------------------------------------------------------------------------------------
function form_actualizar_calo(){
	var pk=$("#txt_calo_pk").val();
	
		var fk_capacidad=$('#txt_fk_capacidad').val();
		var calo_descripcion=$('#txt_calo_descripcion').val();
		var parametros =  {'op':'update','pk':pk,'fk_capacidad':fk_capacidad,
						'calo_descripcion':calo_descripcion}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_capacidadlogro.php',
		  type:  'post',
		  beforeSend: function () {
				
		  },
		  success:  function (response) {
				  UIkit.modal("#frm_box").hide();
				 listar_calo(fk_capacidad);
		  }
  	});
}
//--------------------------------------------------------------------------------------------------------
function form_eliminar_calo(pk){
    var fk_capacidad=$('#txt_fk_capacidad').val();
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_capacidadlogro.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_calo(fk_capacidad);
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}

