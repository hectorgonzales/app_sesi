<?php
require_once("model/General.php");
$general=new General();
$login=$_POST['txt_login'];
$password=$_POST['txt_password'];
$pass=sha1($password);
$pass=strtoupper($pass);

$condincion="usua_login='$login' AND usua_password='$pass'";
$ds=$general->listarRegistros("usuario","pk_usuario","asc",1,$condincion);			        	
$tr=$ds->num_rows;

if ($tr>0){
		$datos=$ds->fetch_assoc();

		session_set_cookie_params(86400); 
		ini_set('session.gc_maxlifetime', 86400);
		session_start();
		$_SESSION['pk_usuario']=$datos['pk_usuario'];
		$_SESSION['usua_login']=$login;
		$_SESSION['usua_usuario']=$datos['usua_usuario'];
		$_SESSION['usua_privilegios']=$datos['usua_privilegios'];
		header("Location:control.php");
}else{
	header("Location:index.php");
}
?>

