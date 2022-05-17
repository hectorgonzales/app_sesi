<?php session_start();
if (isset($_SESSION['usua_login'])){ 
}else{
	header ("Location:index.php");
}
require_once('model/Conexion.php');
$con=new Conexion();
date_default_timezone_set('America/Lima');	
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SESI v.01</title>        
    <link rel="stylesheet" href="resources/css/uikit.min.css" />
     <link rel="stylesheet" href="resources/css/estilo.css" />

     
    <script src="resources/js/jquery-3.6.0.min.js"></script>
    <script src="resources/js/uikit.min.js"></script>
    <script src="resources/js/uikit-icons.min.js"></script>
    <script src="resources/js/uikit-fa-solid-icons.min.js"></script>	

    <script src="resources/js/uid3.js"></script>
    <script src="resources/js/jquery.transit.min.js"></script>
    <script src="resources/js/persson.js"></script>
    
	<script type="text/javascript" src="gstatic/loader.js"></script>

<?php
if(isset($_GET['p'])){
    $p=$_GET['p'];
}else{
	$p="persson"; 
	?>
    <script type="text/javascript" src="controller/js/ctrl_home.js"></script>
<?PHP
}
switch($p){
	case "docu": ?>
    	<script type="text/javascript" src="controller/js/ctrl_documento.js"></script>
	<?php break;?> 
    <?php case "home": ?>
        <script type="text/javascript" src="controller/js/ctrl_home.js"></script>
	<?php break;?>     
    <?php case "1":
          case "2":
          case "3":
          case "4":
          case "5":
          case "6":
          case "7":
          case "8":
    ?>
        <script type="text/javascript" src="controller/js/ctrl_competenciaespecifica.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_competenciaempleabilidad.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_ud.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_capacidadlogro.js"></script>        
        <script type="text/javascript" src="controller/js/ctrl_capacidad.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_modulo.js"></script>
	<?php break;?>
    <?php case "udus": ?>
        <script type="text/javascript" src="controller/js/ctrl_sesion.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_sesionactividad.js"></script>
        <script type="text/javascript" src="controller/js/ctrl_udusuario.js"></script>
	<?php break;?>  
    <?php case "usua": ?>
        <script type="text/javascript" src="controller/js/ctrl_usuario.js"></script>
	<?php break;?>    
<?php
} //end switch
?>
</head>

<body>
<div uk-sticky class="uk-navbar-container tm-navbar-container uk-active uk-light" id="barra-menu">
    <div class="uk-container uk-container-expand">
        <nav uk-navbar>
            <div class="uk-navbar-left">
                <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon></a>
                <a href="#" class="uk-navbar-item uk-logo uk-visible@s">
                    <img src="resources/images/logo_sina_x.png" />
                </a>
                <a href="#" class="uk-navbar-item uk-logo uk-hidden@s">
                    <img src="resources/images/logo_sina_s.png" />
                </a>
            </div>
            
            <div class="uk-navbar-center">
            		<span class="uk-text-large"><span class="uk-visible@s"></span></span>
            </div>
            
            <div class="uk-navbar-right uk-light">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="#"><span uk-icon="user" class="uk-icon-button"></span> &nbsp;  <span class="uk-visible@s"><?=$_SESSION['usua_usuario'];?> </span>  &nbsp; <span uk-icon="chevron-down"></span></a>
                        
                        <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">Opciones</li>
                                <li><a href="#" onclick="cambiar_password_user();">Cambiar Contraseña</a></li>
                                <li class="uk-nav-header">Acciones</li>
                                <li><a href="cerrar.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div id="sidebar" class="tm-sidebar-left uk-background-default">
<!--menu-->
<?php
include_once('menu.php');
?>
<!--menu-->
</div>

<!--//FORMS-->
<div class="content-padder content-background">
	  <?php		
      switch($p){
          case "1":
          case "2":
          case "3":
          case "4":
          case "5":
          case "6":
          case "7":
          case "8":
              include('view/control_modulo.php'); break;
         
          case "udus":include('view/control_udusuario.php'); break;  
          case "usua":include('view/control_usuario.php'); break;
		  case "home":include('view/control_home.php'); break;
		 
          default: include('view/control_home.php'); break;
      }
      ?>
            
</div>
<!--//FORMS-->


<!--//MODALS-->
	<?php //box modal level 1 ?>
	<div id="frm_box" uk-modal>
	  <div class="uk-modal-dialog" id="frm_box_cuerpo">
      	   <button class="uk-modal-close-default" type="button" uk-close></button>
		  
		  <div id="frm_box_header" class="uk-modal-header"></div>
		  <div id="frm_box_centro" class="uk-modal-body"></div>
		  <div id="frm_box_foot" class="uk-modal-footer uk-text-right"></div>
	  </div>
	</div>
	<?php //end box 1?>
	
	<?php //box modal level 2 ?>
	<div id="frm_box_l2" uk-modal>
	  <div class="uk-modal-dialog" id="frm_box_cuerpo_l2">
		  <button class="uk-modal-close-default" type="button" uk-close></button>
		  <div id="frm_box_header_l2" class="uk-modal-header"></div>
		  <div id="frm_box_centro_l2" class="uk-modal-body"></div>
		  <div id="frm_box_foot_l2" class="uk-modal-footer uk-text-right"></div>
	  </div>
	</div>
	<?php //end box 1?>
    

<script src="tinymce/tinymce.min.js" language="javascript"></script>
<script src="resources/js/persson_main.js"></script>
<script src="resources/js/persson_crud.js"></script>
<script src="resources/js/persson_validate.js"></script>      
</body>
</html>