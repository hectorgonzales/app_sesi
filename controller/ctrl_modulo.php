<?php
require_once("../model/Modulo.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="modulo";
$tb_pk="pk_modulo";
$prefijo_op="modu";
$op=$_POST['op'];
switch($op){
?>
<?php
case "ver_modulos":
?>
<div class="uk-card uk-card-default uk-height-1-1">
    <div class="uk-card-header uk-padding-small bg-card-header-1">
        <!--btns-->
            <div uk-grid class="uk-grid-small">
                <div class="uk-width-1-3@s p-t4 uk-text-left@s uk-visible@s">
                    <div class="uk-badge bg-gray p210 uk-text-middle">
                        <span>MODULOS PROFESIONALES</span>
                    </div>
                </div>

                <div class="uk-width-1-3@s uk-padding-remove">
                </div>

                <div class="uk-width-1-3@s uk-padding-remove">
                    <div class="uk-float-right">
                        <a href="#" onClick="form_nuevo_modu();" class="uk-icon-link" uk-icon="plus-circle"></a>
                        
                    </div>
                </div>

            </div>
            <!--btns-->
        
    </div>
    
	<div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true">
    
		<?php
        $fk_carrera=$_POST['fk_carrera'];
        $condicion="fk_carrera='$fk_carrera'";
    
        $ds=$general->listarRegistros("modulo","pk_modulo","asc",1,$condicion);
        $tr=$ds->num_rows;
            if ($tr==0){
                echo "<div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div>";
            }else{?>
            
                  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl" uk-height-match="target: > div > .uk-card">
                      <!--LOCAL-->
                      <?php
                        while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                            $pk_modulo=$fila['pk_modulo'];
                        ?>					
                          <div onClick="main_competencias('<?=$pk_modulo?>');" class="view-hand">
                                  <div class="uk-card uk-card-default uk-card-body uk-card-hover uk-padding-small" >
                                      <div class="uk-card-body">
                                          <div uk-grid class="uk-grid-small">
                                              <div class="uk-width-1-4">
                                                  <span uk-icon="icon:fa-solid-chalkboard-teacher ;ratio:2" class="uk-text-primary"></span>
                                              </div>
                                              <div class="uk-width-3-4">
                                                  <span class="uk-text-primary"><?=$fila['modu_nombre']?></span>
                                              </div>

                                          </div>
                                      </div>
                                      <div class="uk-card-footer uk-padding-small">
                                            <a href="#" onClick="form_modificar_modu('<?=$pk_modulo?>');" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                            <a href="#" onClick="form_eliminar_modu('<?=$pk_modulo?>');" class="uk-icon-link" uk-icon="trash"></a>
                                          
                                      </div>
                                  </div>
                          </div>
                    <?php
                        } //fin while?>
                    
                      <!--LOCAL-->
                  </div>
            <?php
            } //fin si ?>
            
	</div>
</div>    
<?php
break; /*FIN DE LIST*/
?>


<?php
/*INSERT*/
case "insert":
?>
<?php
$fk_carrera=$_POST['fk_carrera'];
$modu_nombre=$_POST['modu_nombre'];
			
	$obj = new Modulo($fk_carrera,
						$modu_nombre);
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
    <input type="hidden" name="pk_edit" id="txt_modu_pk" value="<?=$fila[$tb_pk]?>" />
    <?php /*--*/?>
    
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-remove">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Nombre de Modulo:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_modu_nombre"><?=$fila['modu_nombre']?></textarea>
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
$fk_carrera=$_POST['fk_carrera'];
$modu_nombre=$_POST['modu_nombre'];
			
	$obj = new Modulo($fk_carrera,
						$modu_nombre);
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