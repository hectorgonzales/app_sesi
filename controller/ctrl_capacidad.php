<?php
require_once("../model/Capacidad.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="capacidad";
$tb_pk="pk_capacidad";
$prefijo_op="capa";
$op=$_POST['op'];
switch($op){
?>
<?php
case "list":
?>
		<?php
        $fk_ud=$_POST['fk_ud'];
        $condicion="fk_ud='$fk_ud'";
    
        $ds=$general->listarRegistros($tb,$tb_pk,"asc",1,$condicion);
        $tr=$ds->num_rows;
            if ($tr==0){
                echo "<div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div>";
            }else{?>
            
                  <div uk-grid class="uk-child-width-1-1@s" uk-height-match="target: > div > .uk-card">
                      <!--LOCAL-->
                      <?php
                        while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                        $pk_capacidad=$fila['pk_capacidad'];
                        ?>					
                          <div onClick="listar_calo(<?=$pk_capacidad;?>)" class="view-hand">
                                  <div class="uk-card uk-card-default uk-card-body uk-card-hover uk-padding-small" >
                                      <div class="uk-card-body uk-padding-small">
                                          <span><?=$fila['capa_descripcion']?></span>
                                      </div>
                                      <div class="uk-card-footer uk-padding-small">
                                            <a href="#" onClick="form_modificar_capa('<?=$pk_capacidad?>');" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                            <a href="#" onClick="form_eliminar_capa('<?=$pk_capacidad?>');" class="uk-icon-link" uk-icon="trash"></a>
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
$fk_ud=$_POST['fk_ud'];
$capa_descripcion=$_POST['capa_descripcion'];
			
	$obj = new Capacidad($fk_ud,
						$capa_descripcion);
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
    <input type="hidden" name="pk_edit" id="txt_capa_pk" value="<?=$fila[$tb_pk]?>" />
    <?php /*--*/?>
    
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-remove">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Capacidad:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_capa_descripcion"><?=$fila['capa_descripcion']?></textarea>
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
$fk_ud=$_POST['fk_ud'];
$capa_descripcion=$_POST['capa_descripcion'];
			
	$obj = new Capacidad($fk_ud,
						$capa_descripcion);
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