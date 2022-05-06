<?php
require_once("../model/Ud.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="ud";
$tb_pk="pk_ud";
$prefijo_op="ud";
$op=$_POST['op'];
switch($op){
?>
<?php
case "list":
?>
		<?php
        $fk_modulo=$_POST['fk_modulo'];
        $competencia=$_POST['competencia'];
        $condicion="fk_modulo='$fk_modulo' AND ud_tipo='$competencia'";
    
        $ds=$general->listarRegistros($tb,$tb_pk,"asc",1,$condicion);
        $tr=$ds->num_rows;
            if ($tr==0){
                echo "<div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div>";
            }else{?>
            
                  <div uk-grid class="uk-child-width-1-2@s uk-grid-small" uk-height-match="target: > div > .uk-card">
                      <!--LOCAL-->
                      <?php
                        while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                        $pk_ud=$fila['pk_ud'];
                        ?>					
                          <div onClick="listar_capa(<?=$pk_ud;?>)" class="view-hand">
                                  <div class="uk-card uk-card-default uk-card-body uk-card-hover uk-padding-remove" >
                                      <div class="uk-card-body uk-padding-small">
                                          <span><?=$fila['ud_nombre']?></span>
                                      </div>
                                      <div class="uk-card-footer uk-padding-small">
                                            <a href="#" onClick="form_modificar_ud('<?=$pk_ud?>');" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                                            <a href="#" onClick="form_eliminar_ud('<?=$pk_ud?>');" class="uk-icon-link" uk-icon="trash"></a>
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
$fk_carrera=$_POST['fk_carrera'];
$fk_modulo=$_POST['fk_modulo'];
$ud_tipo=$_POST['ud_tipo'];
$ud_nombre=$_POST['ud_nombre'];
$ud_semestre=$_POST['ud_semestre'];
$ud_horas=$_POST['ud_horas'];
			
	$obj = new Ud($fk_carrera,$fk_modulo,
						$ud_tipo,
						$ud_nombre,
						$ud_semestre,
                        $ud_horas);
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
    <input type="hidden" name="pk_edit" id="txt_ud_pk" value="<?=$fila[$tb_pk]?>" />
    <?php /*--*/?>
    
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Unidad Didactica:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_ud_nombre"><?=$fila['ud_nombre']?></textarea>
                        </div>
                        <div class="uk-width-1-2">
							<label>Semestre:</label>
                            <select class="uk-select uk-form-small" id="txt_ud_semestre">
                                <option <?php if($fila['ud_semestre']=="I"){echo "selected='selected'";}?>>I</option>
                                <option <?php if($fila['ud_semestre']=="II"){echo "selected='selected'";}?>>II</option>
                                <option <?php if($fila['ud_semestre']=="III"){echo "selected='selected'";}?>>III</option>
                                <option <?php if($fila['ud_semestre']=="IV"){echo "selected='selected'";}?>>IV</option>
                                <option <?php if($fila['ud_semestre']=="V"){echo "selected='selected'";}?>>V</option>
                                <option <?php if($fila['ud_semestre']=="VI"){echo "selected='selected'";}?>>VI</option>
							</select>
                        </div>
                        <div class="uk-width-1-2">
							<label>Horas:</label>
							<input type="number" class="uk-input uk-form-small enteros" id="txt_ud_horas" value="<?=$fila['ud_horas']?>" />
						</div>
                    <!--CAMPOS-->
        </div>
       </div>
    </div>
 </form>
<script type="text/javascript">
 validar_campos();
</script>    
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
$fk_modulo=$_POST['fk_modulo'];
$ud_tipo=$_POST['ud_tipo'];
$ud_nombre=$_POST['ud_nombre'];
$ud_semestre=$_POST['ud_semestre'];
$ud_horas=$_POST['ud_horas'];
			
	$obj = new Ud($fk_carrera,$fk_modulo,
						$ud_tipo,
						$ud_nombre,
						$ud_semestre,
                        $ud_horas);
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