
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
                         
                        <div class="uk-width-1-2@s">
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
                        						
						<div class="uk-width-1-2@s">
							<label>Tiempo:</label>
							<input type="number" class="uk-input uk-form-small enteros" id="txt_seac_tiempo" />
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