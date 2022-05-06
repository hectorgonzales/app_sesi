
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="coem";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php
/*NEW*/
case "new":
?>
 <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-small">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Competencia para la Empleabilidad:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_coem_descripcion"></textarea>
                        </div>
                    <!--CAMPOS-->
        </div>
       </div>
    </div>
 </form>

<?php
break; //FIN DE NEW
?>
<?php
} /*FIN SWITCH*/
?>
<script type="text/javascript">
campos_enter();
</script>