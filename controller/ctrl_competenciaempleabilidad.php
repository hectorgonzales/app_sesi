<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
require_once("../model/CompetenciaEmpleabilidad.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="competencia_empleabilidad";
$tb_pk="pk_competencia_empleabilidad";
$prefijo_op="coem";
$op=$_POST['op'];
$privilegios=$_SESSION['usua_privilegios'];
$array_menu=preg_split('[,]', $privilegios);
switch($op){
?>
<?php
case "list":
?>
		<?php
        $pk_modulo=$_POST['pk_modulo'];
        $condicion="fk_modulo='$pk_modulo'";
    
        $ds=$general->listarRegistros("competencia_empleabilidad","pk_competencia_empleabilidad","asc",1,$condicion);
        $tr=$ds->num_rows;
            if ($tr==0){
                echo "<div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div>";
            }else{?>
            
                  <div uk-grid class="uk-child-width-1-2@s" uk-height-match="target: > div > .uk-card">
                      <!--LOCAL-->
                      <?php
                        while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                        $pk_competencia_empleabilidad=$fila['pk_competencia_empleabilidad'];
                        ?>					
                          <div onClick="main_ud('especifico',<?=$pk_competencia_empleabilidad?>');" class="view-hand">
                                  <div class="uk-card uk-card-default uk-card-body uk-card-hover uk-padding-small" >
                                      <div class="uk-card-body uk-padding-small">
                                          <span><?=$fila['coem_descripcion']?></span>
                                      </div>
                                      <div class="uk-card-footer uk-padding-small">
                                            <a href="#" onClick="form_modificar_coem('<?=$pk_competencia_empleabilidad?>');" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                            <a href="#" onClick="form_eliminar_coem('<?=$pk_competencia_empleabilidad?>');" class="uk-icon-link" uk-icon="trash"></a>
                                      </div>
                                  </div>
                          </div>
                    <?php
                        } //fin while?>
                    
                      <!--LOCAL-->
                  </div>
            <?php
            } //fin si ?>
<?php
break; /*FIN DE LIST*/
?>

<?php
/*INSERT*/
case "insert":
?>
<?php
$fk_modulo=$_POST['fk_modulo'];
$coem_descripcion=$_POST['coem_descripcion'];

        $obj = new CompetenciaEmpleabilidad($fk_modulo,
                            $coem_descripcion);
        $obj->insertar();

        

?>
<?php
break; //FIN DE INSERT
?>

<?php
/*EDIT*/
case "edit":
?>
<?php
$pk=$_POST['pk'];
$ds=$general->modificarRegistro($tb,$tb_pk,$pk);
$fila=$ds->fetch_assoc();
?>
<form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <?php /*--*/?>
    <input type="hidden" name="pk_edit" id="txt_coem_pk" value="<?=$fila[$tb_pk]?>" />
    <?php /*--*/?>
    
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-remove">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Competencia para la Empleabilidad:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_coem_descripcion"><?=$fila['coem_descripcion']?></textarea>
                        </div>
                    <!--CAMPOS-->
        </div>
       </div>
    </div>
 </form>

<?php
break; /*FIN DE EDIT*/
?>


<?php
/*UPDATE*/
case "update":
?>
<?php
$pk=$_POST['pk'];
$fk_modulo=$_POST['fk_modulo'];
$coem_descripcion=$_POST['coem_descripcion'];
			
	$obj = new CompetenciaEmpleabilidad($fk_modulo,
						$coem_descripcion);
  	$obj->actualizar($pk);
?>
<?php
break; /*FIN DE UPDATE*/
?>
<?php
case "delete":
?>
<?php
	$pk=$_POST['pk'];		
	$general->eliminarRegistro($tb,$tb_pk,$pk);		
?>
<?php
break; /* END DELETE*/
?>
<?php
} /*FIN SWITCH*/
?>