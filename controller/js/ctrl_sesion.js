//--------------------------------------------------------------------------------------------------------
function listar_sesi(){
    var fk_ud_usuario=$('#txt_fk_ud_usuario').val();

  	var parametros = {'op':'list','fk_ud_usuario':fk_ud_usuario}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_sesion.php',
		  type: 'post',
		  beforeSend: function () {
				  $("#ct_form_body_sesi").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form_body_sesi").html(response);
		  }
  	});
}

function form_insertar_sesi(){	
		var fk_ud_usuario=$('#txt_fk_ud_usuario').val();
        if(fk_ud_usuario>0){
		  var parametros = {'op':'insert',
						'fk_ud_usuario':fk_ud_usuario,
						}
            $.ajax({
                  data:  parametros,
                  cache: false,		  
                  url:  'controller/ctrl_sesion.php',
                  type: 'post',
                  beforeSend: function () {
                         $("#ct_form_body_sesi").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
                  },
                  success:  function (response) {
                         listar_sesi();
                  }
            });
        }else{
            msg_popup("<i uk-icon='info'></i> Debe seleccionar una Unidad Didactica.","danger","1500");
        }
}

//--------------------------------------------------------------------------------------------------------
function info_general(pk){
  	var parametros = {'op':'info_general','pk':pk}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:  'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#ct_form").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#ct_form").html(response);
				  //$("#campo").focus();				  
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function cambiar_hora_sincrona(){
    var horas=$("#txt_sesi_horas").val();
    var horas_min=horas*60;
    var horas_asinc=$("#txt_sesi_hora_asincrona").val();
    var horas_sinc=horas_min-horas_asinc;
    
    $("#txt_sesi_hora_sincrona").val(horas_sinc);
}


//--------------------------------------------------------------------------------------------------------
function listar_capacidad_logro(fks_capacidad_logro){
    var fks_capacidad = [];
        $('#tb_capacidad input[type="checkbox"]:checked').each(function () {
                fks_capacidad.push($(this).val());
        });
  	var parametros = {'op':'listar_capacidad_logro','fks_capacidad':fks_capacidad,'fks_capacidad_logro':fks_capacidad_logro}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:  'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#tb_capacidad_logro").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				  $("#tb_capacidad_logro").html(response);
                  pasar_capacidad_logro();
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function pasar_capacidad_logro(){
    var fks_capacidad_logro = [];
        $('#tb_capacidad_logro input[type="checkbox"]:checked').each(function () {
                fks_capacidad_logro.push($(this).val());
        });
  	var parametros = {'op':'pasar_capacidad_logro','fks_capacidad_logro':fks_capacidad_logro}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:  'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#txt_plap_indicador_competencia").html("");
		  },
		  success:  function (response) {
				  $("#txt_plap_indicador_competencia").html(response);			  
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function listar_eva_tec_instrumentos(pk_eva_tecnica, fk_eva_tecnica_instrumento){
    
  	var parametros = {'op':'listar_eva_tec_instrumentos','pk_eva_tecnica':pk_eva_tecnica,'fk_eva_tecnica_instrumento':fk_eva_tecnica_instrumento}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:  'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
				  $("#txt_eva_instrumentos").html("");
		  },
		  success:  function (response) {
				  $("#txt_eva_instrumentos").html(response);			  
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function duplicar_sesion(pk){
    
  	var parametros = {'op':'duplicar_sesion','pk':pk}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:  'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
              listar_sesi();		  
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function actualizar_ordenar_sesi(){
	var orden ="";
	var nuevo_orden =new Array();;
	$('#ul_sesiones').find('li').each(function(i) {
	  var obj=new Object();
	  obj.pk=$(this).attr('id');
	  obj.orden=$(this).index()+1;
	  nuevo_orden.push(obj);
	});
	orden = JSON.stringify(nuevo_orden);
	
	var parametros = {'op':'actualizar_ordenar_sesi','orden':orden}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url: 'controller/ctrl_sesion.php',
		  type: 'post',
		  beforeSend: function () {
		  },
		  success:  function (response) {
                   listar_sesi();
		  }
  	});
}


//--------------------------------------------------------------------------------------------------------
function validaForm_sesi(op_frm) {  //1 ADD 2 EDIT
		
	if(op_frm==1){
		form_actualizar_sesi_general();
	}else if(op_frm==2){
		form_actualizar_sesi();
	}

}

//--------------------------------------------------------------------------------------------------------
function form_actualizar_sesi_general(){
	var pk=$("#txt_sesi_pk").val();

		var sesi_horas=$('#txt_sesi_horas').val();
		var sesi_hora_sincrona=$('#txt_sesi_hora_sincrona').val();
		var sesi_hora_asincrona=$('#txt_sesi_hora_asincrona').val();
        
        var fks_competencia_especifica = [];
        $('#tb_competencia_especifica input[type="checkbox"]:checked').each(function () {
                fks_competencia_especifica.push($(this).val());
        });

        var fks_competencia_empleabilidad = [];
        $('#tb_competencia_empleabilidad input[type="checkbox"]:checked').each(function () {
                fks_competencia_empleabilidad.push($(this).val());
        });

        var fks_capacidad = [];
        $('#tb_capacidad input[type="checkbox"]:checked').each(function () {
                fks_capacidad.push($(this).val());
        });
        
        var fks_capacidad_logro = [];
        $('#tb_capacidad_logro input[type="checkbox"]:checked').each(function () {
                fks_capacidad_logro.push($(this).val());
        });       
        
		var sesi_tema=$('#txt_sesi_tema').val();
		var sesi_act_practico=$('#txt_sesi_act_practico').prop('checked');
		var sesi_act_teopractico=$('#txt_sesi_act_teopractico').prop('checked');
		var sesi_tipo_presencial=$('#txt_sesi_tipo_presencial').prop('checked');
		var sesi_tipo_virtsincrono=$('#txt_sesi_tipo_virtsincrono').prop('checked');
		var sesi_tipo_virtasincrono=$('#txt_sesi_tipo_virtasincrono').prop('checked');
		var sesi_fecha=$('#txt_sesi_fecha').val();
		var plap_indicador_competencia=$('#txt_plap_indicador_competencia').val();
		var plap_indicador_capacidad=$('#txt_plap_indicador_capacidad').val();
		var plap_logro_sesion=$('#txt_plap_logro_sesion').val();
        var inicio_estrategia=$('#txt_inicio_estrategia').val();
		var desarrollo_estrategia=$('#txt_desarrollo_estrategia').val();
		var cierre_estrategia=$('#txt_cierre_estrategia').val();
        var eva_indicador_logro=$('#txt_eva_indicador_logro').val();
		var fk_eva_tecnica=$('#txt_eva_tecnicas').val();
		var eva_tecnicas=$('#txt_eva_tecnicas option:selected').text();
        
        var fk_eva_tecnica_instrumento=$('#txt_eva_instrumentos').val();
		var eva_instrumentos=$('#txt_eva_instrumentos option:selected').text();
		var eva_peso=$('#txt_eva_peso').val();
		var eva_momento=$('#txt_eva_momento').val();
		var biblio_docente=$('#txt_biblio_docente').val();
		var biblio_estudiante=$('#txt_biblio_estudiante').val();
        
        
		var parametros =  {'op':'update_general','pk':pk,
						'sesi_horas':sesi_horas,
						'sesi_hora_sincrona':sesi_hora_sincrona,
						'sesi_hora_asincrona':sesi_hora_asincrona,
						'fks_competencia_especifica':fks_competencia_especifica,
						'fks_competencia_empleabilidad':fks_competencia_empleabilidad,
						'fks_capacidad':fks_capacidad,
						'fks_capacidad_logro':fks_capacidad_logro,
						'sesi_tema':sesi_tema,
						'sesi_act_practico':sesi_act_practico,
						'sesi_act_teopractico':sesi_act_teopractico,
						'sesi_tipo_presencial':sesi_tipo_presencial,
						'sesi_tipo_virtsincrono':sesi_tipo_virtsincrono,
						'sesi_tipo_virtasincrono':sesi_tipo_virtasincrono,
						'sesi_fecha':sesi_fecha,
						'plap_indicador_competencia':plap_indicador_competencia,
						'plap_indicador_capacidad':plap_indicador_capacidad,
						'plap_logro_sesion':plap_logro_sesion,
                        'inicio_estrategia':inicio_estrategia,
						'desarrollo_estrategia':desarrollo_estrategia,
						'cierre_estrategia':cierre_estrategia,
                        'eva_indicador_logro':eva_indicador_logro,
                        'fk_eva_tecnica':fk_eva_tecnica,
						'eva_tecnicas':eva_tecnicas,
                        
						'fk_eva_tecnica_instrumento':fk_eva_tecnica_instrumento,
						'eva_instrumentos':eva_instrumentos,
						'eva_peso':eva_peso,
						'eva_momento':eva_momento,
						'biblio_docente':biblio_docente,
						'biblio_estudiante':biblio_estudiante
						}
  	$.ajax({
		  data:  parametros,
		  cache: false,		  
		  url:   'controller/ctrl_sesion.php',
		  type:  'post',
		  beforeSend: function () {
				$("#ct_form_body").html("<div class='uk-text-center uk-text-primary uk-margin-top'><div uk-spinner></div> Procesando...</div>");
		  },
		  success:  function (response) {
				 listar_sesi();
		  }
  	});
}

//--------------------------------------------------------------------------------------------------------
function form_eliminar_sesi(pk){
	UIkit.modal.confirm('Desea eliminar el Registro?.', {labels:{ ok: 'Si', cancel:'No'}}).then(function() {
  		var parametros = {'op':'delete','pk':pk}
	  	$.ajax({
			  data:  parametros,
			  cache: false,		  
			  url:   'controller/ctrl_sesion.php',
			  type:  'post',
			  beforeSend: function () {
			  },
			  success:  function (response) {
					msg_popup("<i uk-icon='check'></i> Registro eliminado.");
					listar_sesi();
                    //actualizar_ordenar_sesi();
                    
			  }
	  	});	
		
	}, function () {
		console.log('no.')
	});
	
}



//=============================================================
function ver_sesion_pdf(pk){
	if(pk>0){
		var url='reports/ctrl_reporte_sesion.php?pk_sesion='+pk;
		ver_msg_modal_pdf("ACTIVIDAD DE APRENDIZAJE",url,"70%","600px");
	}else{
		msg_popup("<i class='uk-icon-check'></i> Seleccione un registro.","danger");
	}
}


