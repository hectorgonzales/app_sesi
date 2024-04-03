
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="seac";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php
case "new":
?>
<?php
$fk_sesion=$_POST['fk_sesion'];
$momento=$_POST['momento'];
?>
<?php       
$ds=$general->listarRegistros("sesion_actividad","pk_sesion_actividad","asc",1,"fk_sesion='$fk_sesion'");			        	

    $tiempo_actvidad_total=0;
    while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
        $tiempo=$fila['seac_tiempo'];
        $tiempo_actvidad_total+=$tiempo;
    } //fin while

$horas_sesion = $general->valorCampo("sesion","sesi_horas","pk_sesion='$fk_sesion'");
$minutos_sesion=$horas_sesion*45;
$tiempo_disponible = $minutos_sesion - $tiempo_actvidad_total;
$color_label="uk-label-danger";
if($tiempo_disponible>0){
    $color_label="uk-label-success";
}
?>
            
 <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <input type="hidden" id="txt_fk_sesion" value="<?=$fk_sesion?>" />
                        <input type="hidden" id="txt_seac_momento" value="<?=$momento?>" />
                        
                        <div class="uk-width-1-1">
                            <label>Actividad:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_seac_actividad"></textarea>
                         </div>
                         
                        <div class="uk-width-1-3@s">
							<label>Recurso:</label>
                            <select class="uk-select uk-form-small" id="txt_seac_recurso">
                                <?php
                                  $ds=$general->listarRegistros("sesion_recurso","pk_sesion_recurso","asc");
                                  while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                                      ?>
                                      <option value="<?=$fila['sere_icono']?>"><?=$fila['sere_descripcion']?></option>
                                  <?php 
                                  }//end while?>
							</select>
                        </div>
                        
                        <div class="uk-width-1-3@s">
							<label>Tiempo:(Tiempo disponible  <span class="uk-badge <?=$color_label;?>"><?=$tiempo_disponible;?></span>) </label>
							<input type="number" class="uk-input uk-form-small enteros" id="txt_seac_tiempo" />
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
break; //FIN DE NEW
?>
<?php
} /*FIN SWITCH*/
?>
<script type="text/javascript">
campos_enter();
</script>