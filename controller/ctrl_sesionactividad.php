<?php
require_once("../model/SesionActividad.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="sesion_actividad";
$tb_pk="pk_sesion_actividad";
$prefijo_op="seac";
$op=$_POST['op'];
switch($op){
?>
<?php
case "list":
?>
<?php
$fk_sesion=$_POST['fk_sesion'];
$momento=$_POST['momento'];
?>
<table id="tb_lista" class="tb_lista3" width="100%">
     <thead>
            <tr>
            <th>N°</th>
				<th data-campo="seac_actividad" class="">ACTIVIDADES DE <?=strtoupper($momento)?></th>
				<th width="80" data-campo="seac_recurso" class="uk-visible@s">RECURSO</th>
				<th width="80" data-campo="seac_tiempo" class="uk-visible@s">TIEMPO</th>
                <th width="30" data-campo="" class="">M</th>
                <th width="30" data-campo="" class="">E</th>
	        </tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php
            $tiempo_actvidad_total=0;
			$ds=$general->listarRegistros($tb,$tb_pk,"asc",1,"seac_momento='$momento' AND fk_sesion='$fk_sesion'");			        	
			$tr=$ds->num_rows;

			if ($tr==0){
				echo "<td colspan='6'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
                
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                    $pk_sesion_actividad=$fila['pk_sesion_actividad'];
                    $cuenta = mb_strpos($fila['seac_actividad'], '</p>') + 5;
                    $sumario = mb_substr($fila['seac_actividad'], 0, $cuenta);
                    $actividad=preg_replace( "/<br>|\n/","", $sumario);
                    $tiempo=(trim($fila['seac_tiempo'])=="" || is_null($fila['seac_tiempo']))?0:$fila['seac_tiempo'];
                    $tiempo_actvidad_total+=$tiempo;
                    ?>
                    <tr id="fila<?=$fila[$tb_pk];?>">
                        <td class="tc bgn" width="30"><?=$n;?></td>
                        <td class=""><?=$actividad;?></td>
                        <td class="uk-visible@s"><?=$fila['seac_recurso']?></td>
                        <td class="uk-visible@s tc"><?=$tiempo." min."?></td>								
                        <td class="tc"><a href="#" onClick="form_modificar_seac('<?=$pk_sesion_actividad?>');" class="uk-icon-link" uk-icon="file-edit"></a></td>
                        <td class="tc"><a href="#" onClick="form_eliminar_seac('<?=$pk_sesion_actividad?>');" class="uk-icon-link" uk-icon="trash"></a></td>
                    </tr>               
                    <?php
                    $n++;
				} //fin while
			} //fin si
			?>
    </tbody>
    <tfoot>
        <tr class="td_finales no_hand">
        <td colspan="3" class="tr td_sb">Total de Minutos:</td>
        <td class="tc"><?=$tiempo_actvidad_total;?> min</td>
        <td colspan="2" class="td_sb"></td>
        </tr>
    </tfoot>
    <!--Table body-->
</table>
<!--Table-->
<script>
pasar_un_valor(<?=$tr;?>,'#lb_total_registros');
</script>
<?php
break; /*FIN DE LIST*/
?>


<?php
/*INSERT*/
case "insert":
?>
<?php
$fk_sesion=$_POST['fk_sesion'];
$seac_momento=$_POST['seac_momento'];
$seac_actividad=$_POST['seac_actividad'];
$seac_recurso=$_POST['seac_recurso'];
$seac_recurso_icono=$_POST['seac_recurso_icono'];
$seac_tiempo=$_POST['seac_tiempo'];
			
	$obj = new SesionActividad($fk_sesion,
						$seac_momento,
						$seac_actividad,
						$seac_recurso,
						$seac_recurso_icono,
						$seac_tiempo);
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

<?php      
$fk_sesion=$fila['fk_sesion'];
$ds2=$general->listarRegistros("sesion_actividad","pk_sesion_actividad","asc",1,"fk_sesion='$fk_sesion'");			        	

    $tiempo_actvidad_total=0;
    while($fila2=$ds2->fetch_array(MYSQLI_ASSOC)){
        $tiempo=$fila2['seac_tiempo'];
        $tiempo_actvidad_total+=$tiempo;
    } //fin while

$horas_sesion = $general->valorCampo("sesion","sesi_horas","pk_sesion='$fk_sesion'");
$minutos_sesion=$horas_sesion*HORA_PEDAGOGICA;
$tiempo_disponible = $minutos_sesion - $tiempo_actvidad_total;
$color_label="uk-label-danger";
if($tiempo_disponible>0){
    $color_label="uk-label-success";
}
?>

<form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <?php /*--*/?>
    <input type="hidden" name="pk_edit" id="txt_seac_pk" value="<?=$fila[$tb_pk]?>" />
    <?php /*--*/?>
    
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <input type="hidden" id="txt_fk_sesion" value="<?=$fila['fk_sesion'];?>" />
                        <input type="hidden" id="txt_seac_momento" value="<?=$fila['seac_momento'];?>" />
                        
                        <div class="uk-width-1-1">
                            <label>Actividad:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_seac_actividad"><?=$fila['seac_actividad'];?></textarea>
                         </div>
                         
                        <div class="uk-width-1-2@s">
							<label>Recurso:</label>
                            <select class="uk-select uk-form-small" id="txt_seac_recurso">
                                <?php
                                  
                                  $ds2=$general->listarRegistros("sesion_recurso","pk_sesion_recurso","asc");
                                  while($fila2=$ds2->fetch_array(MYSQLI_ASSOC)){
                                      ?>
                                      <option value="<?=$fila2['sere_icono']?>" <?php if($fila['seac_recurso']==$fila2['sere_descripcion']){echo "selected='selected'";}?>><?=$fila2['sere_descripcion']?></option>
                                  <?php 
                                  }//end while?>
							</select>
                        </div>
                        						
						<div class="uk-width-1-2@s">
							<label>Tiempo: </label>
							<input type="number" class="uk-input uk-form-small enteros" id="txt_seac_tiempo" value="<?=$fila['seac_tiempo'];?>" />
                            <input type="hidden" id="txt_tiempo_disponible" value="<?=$tiempo_disponible;?>"/>
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
$fk_sesion=$_POST['fk_sesion'];
$seac_momento=$_POST['seac_momento'];
$seac_actividad=$_POST['seac_actividad'];
$seac_recurso=$_POST['seac_recurso'];
$seac_recurso_icono=$_POST['seac_recurso_icono'];
$seac_tiempo=$_POST['seac_tiempo'];
			
	$obj = new SesionActividad($fk_sesion,
						$seac_momento,
						$seac_actividad,
						$seac_recurso,
						$seac_recurso_icono,
						$seac_tiempo);
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