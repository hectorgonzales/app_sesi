
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="sesi";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>

<?php
} /*FIN SWITCH*/
?>
<script type="text/javascript">
campos_enter();
</script>