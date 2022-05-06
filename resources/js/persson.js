$(document).ready(function() {
	$.ajaxSetup({ cache:false });
});


$(document).on("keydown", function (e) {
    if (e.which === 8 && !$(e.target).is("input:not([readonly]):not([type=radio]):not([type=checkbox]), textarea, [contentEditable], [contentEditable=true]")) {
        e.preventDefault();
    }
});

//======GET PARAMETERS======================
function getParams(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}


//======ACTIVAR CALNDA======================
//----------------------------------------HOME 
/*function activar_calendar(id) {
	tail.DateTime(id, {
   
		dateFormat: 'dd/mm/YYYY',
		timeFormat: "HH:ii:ss",
		locale: "es",
		closeButton: true,
		today: true
	
    
	});
}*/

function activar_calendar(el,id) {
	const picker = new WindowDatePicker({
      el: el,
      inputEl: id,
	  type: "DATE",
	  showButtons: true,
	 inputToggle: true,
	});
}


//======DESACTIVAR ACTIVAR CONTROLES======================
function desactivar_control(id, bool=true){
	$(id).prop('disabled',bool);
}

function desactivar_panel(id){
	$(id).addClass('disabled_control');
}
function activar_panel(id){
	$(id).removeClass('disabled_control');
}

//======OCULTAR / MOSTRAR CONTROLES======================
function ocultar_control(id){
	$(id).addClass('hide_control');
}
function mostrar_control(id){
	$(id).removeClass('hide_control');
}

//======CLIC EN BOTON (OBJ)======================
function hacer_clic(id){
	$(id).trigger('click');
}


//======MSGS ALERT======================
function msg_alert(txt){
	UIkit.modal.alert(txt);
}

//======MSGS POPUP======================
function msg_popup(txt,tipo='success',tiempo='900'){
	UIkit.notification({
	message: txt,
	status: tipo,
	pos: 'top-center',
	timeout: tiempo
	});
}

//======MSGS MODAL======================	
function ver_msg_modal(titulo,msg,icon="check",fondo="secondary",boton="cerrar",esc=true){
		$("#frm_box_cuerpo_l2").css('width','350px');
		var t=$("#frm_box_header_l2")
		var c=$("#frm_box_centro_l2")
		var p=$("#frm_box_foot_l2")
		t.html("<h4><span uk-icon='icon:"+icon+"'></span> " +titulo+"</h4>");
		c.html(msg);
		if(boton=="cerrar"){
			p.html("<button type='button' class='uk-button uk-modal-close'>Cerrar</button>");;
		}else{
			p.html("");
		}
		UIkit.modal('#frm_box_l2', {center: true, modal: false, escClose: esc, 'bgClose': false}).show(); // { bgClose: false, escClose: false, modal: false, keyboard:false}		
}

//======MSGS MODAL PDF======================	
function ver_msg_modal_pdf(titulo,url,ancho="350px",alto="100px",boton="cerrar"){
		$("#frm_box_cuerpo_l2").css('width',ancho);
		$("#frm_box_centro_l2").css('height',alto);
		var t=$("#frm_box_header_l2")
		var c=$("#frm_box_centro_l2")
		var p=$("#frm_box_foot_l2")
		t.html("<h4>"+titulo+"</h4>");
		c.html('<iframe src="'+url+'" style="width:100%;height:100%"></iframe>');
		if(boton=="cerrar"){
			p.html("<button type='button' class='uk-button uk-modal-close'>Cerrar</button>");;
		}else{
			p.html("");
		}
		UIkit.modal('#frm_box_l2', {center: true, modal: false, escClose: false, 'bgClose': false}).show(); // { bgClose: false, escClose: false, modal: false, keyboard:false}		
}


//======CAMPOS FRM======================
function campos_enter(){
	$('input').on("keydown", function(e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if(key == 13) {
            e.preventDefault();
            var inputs = $(this).closest('form').find(':input:visible');
            //inputs.eq( inputs.index(this)+ 1 ).focus();
			var control =inputs.eq( inputs.index(this)+ 1 );
			control.focus();
			control.select();
        }
    });
}


//======LISTAS======================
function tb_seleccionar_fila_lista(tb,n){
	//---------SELECT FIELD----------------
	var color="selected1";
	if(n==1){
		$(tb+" td").on("click", buscarColumna);
		color="selected1";
	}else if(n==2){
		$(tb+" td").on("click", buscarColumna2);
		color="selected2";
	}else if(n==3){
		$(tb+" td").on("click", buscarColumna3);
		color="selected3";
	}else if(n==4){
		$(tb+" td").on("click", buscarColumna3);
		color="selected4";        
	}
	//-----------------------------------
   var table = $(tb);
    table.on('click', 'tr', function () {
        if ( $(this).hasClass(color) ) {
            $(this).removeClass(color);
        }
        else {
           $('tr.'+color).removeClass(color);
            $(this).addClass(color);			
        }
    });
}


//---box
function tb_seleccionar_fila_lista_box1(tb){
   var table = $(tb);
    table.on('click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
           $('tr.selected').removeClass('selected');
            $(this).addClass('selected');			
        }
    });
}
function tb_seleccionar_fila_lista_box2(tb){
   var table = $(tb);
    table.on('click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
           $('tr.selected').removeClass('selected');
            $(this).addClass('selected');			
        }
    });
}


//------------------------------------------------------------
function buscarColumna() {
    var $td = $(this),
    $th = $td.closest('table').find('th').eq($td.index());
	var nombre_campo=$th.attr("data-campo");
	var titulo_campo=$th.text();
	if(titulo_campo.trim()==""){ 
	}else{
		//$('#box_lb_buscar').html("BUSCAR POR: <span class='uk-text-primary'>"+titulo_campo+"</span>");
		$('#box_txt_buscar').attr("placeholder",titulo_campo);
		$('#box_txt_buscar').val("");
		$('#box_txt_buscar_campo').val(nombre_campo);
	}
}

function buscarColumna2() {
    var $td = $(this),
    $th = $td.closest('table').find('th').eq($td.index());
	var nombre_campo=$th.attr("data-campo");
	var titulo_campo=$th.text();
	if(titulo_campo.trim()==""){ 
	}else{
		//$('#box_lb_buscar').html("BUSCAR POR: <span class='uk-text-primary'>"+titulo_campo+"</span>");
		$('#box_txt_buscar2').attr("placeholder",titulo_campo);
		$('#box_txt_buscar2').val("");
		$('#box_txt_buscar_campo2').val(nombre_campo);
	}
}

function buscarColumna3() {
    var $td = $(this),
    $th = $td.closest('table').find('th').eq($td.index());
	var nombre_campo=$th.attr("data-campo");
	var titulo_campo=$th.text();
	if(titulo_campo.trim()==""){ 
	}else{
		//$('#box_lb_buscar').html("BUSCAR POR: <span class='uk-text-primary'>"+titulo_campo+"</span>");
		$('#box_txt_buscar3').attr("placeholder",titulo_campo);
		$('#box_txt_buscar3').val("");
		$('#box_txt_buscar_campo3').val(nombre_campo);
	}
}

//------------------------------------------------------------
function tb_seleccionar_fila_lista_v2(tb){
	//---------SELECT FIELD----------------
	$(tb+" td").on("click", buscarColumna_v2);
	//-----------------------------------
   var table = $(tb);
    table.on('click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
           $('tr.selected').removeClass('selected');
            $(this).addClass('selected');			
        }
    });
}
function buscarColumna_v2() {
    var $td = $(this),
    $th = $td.closest('table').find('th').eq($td.index());
	var nombre_campo=$th.attr("data-campo");
	var titulo_campo=$th.text();
	if(titulo_campo.trim()==""){ 
	}else{
		$('#box_lb_buscar_2').html("BUSCAR POR: <span class='uk-text-primary'>"+titulo_campo+"</span>");
		$('#box_txt_buscar_campo_2').val(nombre_campo);
	}
}

//---------------------------TXT HIDDEN PK LISTA---FOR EDT---DEL-----------------------------------------------
function pasar_pk_fila_lista(txt_pk,pk){
	$(txt_pk).val(pk);
}
//--------------------------------------------------------------------------------------------------------
//---------------------------TXT HIDDEN PK LISTA---FOR EDT---DEL-----------------------------------------------
function pasar_un_valor(valor,campo){
	$(campo).html(valor);
}
function pasar_dos_valores(valor1,campo1,valor2,campo2){
	$(campo1).val(valor1);
	$(campo2).val(valor2);
}
//---------------------------QUITAR FILA DE TABLA-----------------------------------------------
function quitar_fila_lista(pk,nombre_fila='#fila') {
    $(nombre_fila + pk).remove();
	$("#txt_pk_hidden").val("");
}
//--------------------------------------------------------------------------------------------------------

//------------------------------------------------------------
function limpiar_text_buscar(){
	$('#box_txt_buscar').val("");
	$('#box_txt_buscar').focus(); 
	var e = jQuery.Event( 'keydown',{ which: $.ui.keyCode.ENTER });
	$('#box_txt_buscar').trigger(e);	
}
function limpiar_text_buscar2(){
	$('#box_txt_buscar2').val("");
	$('#box_txt_buscar2').focus(); 
	var e = jQuery.Event( 'keydown',{ which: $.ui.keyCode.ENTER });
	$('#box_txt_buscar2').trigger(e);	
}
//------------------------------------------------------------
function limpiar_txt_pk_hidden(){
	$("#txt_pk_hidden").val("");	
}

//----------------------------CAMBIAR FORMATO FECHA DE DD/MM/YYYY A YYYY-MM-DD--------------------------------
function formattedDate(date) {
    var arr = date.split('/');
    if (arr[0].length < 2) arr[0] = '0' + arr[0];
    if (arr[1].length < 2) arr[1] = '0' + arr[1];
    return [arr[2], arr[1], arr[0]].join('-');
}

//=====================SELECCIONAR CHECKS==========================================
function seleccionar_checks(contenedor) {
	$(contenedor+" :checkbox").prop('checked', true);
}
function deseleccionar_checks(contenedor) {
	$(contenedor+" :checkbox").prop('checked', false);
}
//----seleccion multiple
function seleccionar_tr_checks(tabla) {
	$(tabla+" :checkbox").change(function(){
		$(this).closest('tr').toggleClass("highlight", this.checked);
	});
}


//--------------------------------CARGAR BARRAS-----------------------------------------------------------------------	
function ver_barras(ct,op){
  var bar=$(ct);
  var parametros = {'op':op}
  $.ajax({
		  data:  parametros,
		  //cache: false,
		  url:   'view/view_mesainterno_barras.php',
		  type:  'post',
		  beforeSend: function () {
				  bar.html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
		  },
		  success:  function (response) {
				  bar.html(response);
				  
		  }
  });
}

//--------------------------------BOX MSG ESPERA----------------------------------------------------------------------	
function ver_msg_box(titulo,msg){
		$("#frm_box_cuerpo_l2").css('width','350px');
		var t=$("#frm_box_header_l2")
		var c=$("#frm_box_centro_l2")
		var p=$("#frm_box_foot_l2")

		t.html("<h4>"+titulo+"</h4>");
		c.html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> "+msg);
		p.html("");
		UIkit.modal('#frm_box_l2', {center: true, modal: false,bgclose:false}).show();	
}

//--------------------------------BOX CHANGE PASS USER----------------------------------------------------------------------
function cambiar_password_user(){
	$("#frm_box_cuerpo").css('width','350px');	
	var t=$("#frm_box_header")
	var c=$("#frm_box_centro")
	var p=$("#frm_box_foot")
	var parametros = {'op':'cambiar_password'}
  	$.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'view/view_usuario.php',
		  type:  'post',
		  beforeSend: function () {	 
		  },
		  success:  function (response) {
			t.html("<h4>CAMBIAR CONTRASEÑA</h4>");
			c.html(response);
			p.html("<button type='button' class='uk-button uk-modal-close'>Cerrar</button> <button type='button' onclick='actualizar_password_user();' class='uk-button uk-button-primary'>Aceptar</button>");
			UIkit.modal("#frm_box").show(); 
			$("#frm_user_pass_txt_actual").focus();
		  }
  	});
}

function actualizar_password_user(){
  var login=$('#frm_user_pass_txt_login').val();
   var pass_a=$('#frm_user_pass_txt_actual').val();
    var pass_1=$('#frm_user_pass_txt_n_pass1').val();
	 var pass_2=$('#frm_user_pass_txt_n_pass2').val();
	 var bar=$('#frm_user_pass_msg');
  var parametros = {'op':'actualizar_password','login':login,'pass_a':pass_a,'pass_1':pass_1,'pass_2':pass_2}
  $.ajax({
		  data:  parametros,
		  cache: false,
		  url:   'controller/ctrl_usuario.php',
		  type:  'post',
		  beforeSend: function () {
				  bar.html("<i class=\"uk-icon-refresh uk-icon-spin\"></i> Procesando...");
		  },
		  success:  function (response) {
				  bar.html(response);
					$('#frm_user_pass_txt_actual').val('');
					$('#frm_user_pass_txt_n_pass1').val('');
					$('#frm_user_pass_txt_n_pass2').val('');
				    
		  }
  });
}

//=========================VEDITOR=======================================
function loadTinyMCEEditor_basic(txt) {
	tinymce.remove();
    tinyMCE.init({
		statusbar:false,
		menubar:false,
		selector: txt,
		language : 'es',
		height:300,
		//entity_encoding: 'raw',
		plugins: [
		'advlist lists'
		],		
		save_enablewhendirty: true,
		toolbar1: 'undo redo outdent indent fontsizeselect bold italic underline fontsize forecolor backcolor alignleft aligncenter alignright alignjustify bullist numlist'
      });
}

function loadTinyMCEEditor_docs(txt) {
	tinymce.remove();
    tinyMCE.init({
		menu:"false",
		statusbar:false,
		selector: txt,
		language : 'es',
		height:300,
		//entity_encoding: 'raw',
		save_enablewhendirty: true,
		plugins: [
		'advlist lists image charmap print preview hr anchor',
		'insertdatetime nonbreaking save contextmenu directionality',
		'paste textcolor colorpicker textpattern imagetools toc save' //quite table y salto de pag
		],
		toolbar1: 'undo redo bullist numlist fontsizeselect bold italic underline fontsize forecolor backcolor alignleft aligncenter alignright alignjustify',
		image_advtab: true,
		//table_advtab: true
      });
    tinyMCE.execCommand('mceAddControl', false, txt);
}


function loadTinyMCEEditor_full(txt) {
	tinymce.remove();
    tinyMCE.init({
		statusbar:false,
		selector: txt,
		language : 'es',
		height:400,
		//entity_encoding: 'raw',
		save_enablewhendirty: true,
		plugins: [
		'advlist lists image charmap print preview hr anchor pagebreak',
		'insertdatetime nonbreaking save table contextmenu directionality',
		'paste textcolor colorpicker textpattern imagetools toc save'
		],
		toolbar1: 'undo redo outdent indent fontselect fontsizeselect bold italic underline fontsize forecolor backcolor alignleft aligncenter alignright alignjustify bullist numlist',
		image_advtab: true,
		//table_advtab: true
      });
    //tinyMCE.execCommand('mceAddControl', false, '#frm_doc_txt_cuerpo');
}


