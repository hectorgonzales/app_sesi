
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="udus";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();

$privilegios=$_SESSION['usua_privilegios'];

switch($op){
?>
<?php
case "main":
?>
<div uk-grid class="uk-grid-small">
  
      <div class="uk-width-2-5">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                   	<!--btns-->
                    <div uk-grid class="uk-grid-small">
                        <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                            <div class="uk-badge bg-gray p210 uk-text-middle">
                            	<span>UNIDAD DIDACTICA</span>
                            </div>
                        </div>
                         <div class="uk-width-1-2@s uk-padding-remove">
                            <div class="uk-float-right">
                                <a href="#" onClick="form_nuevo_udus();" class="uk-icon-link" uk-icon="plus-circle"></a>
                            </div>
                        </div>
                    </div>
                    <!--btns-->
                  </div>
                  
                  <div id="ct_form_body" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                        <!--contents-->
                  </div>
                  
                  <div class="uk-card-footer uk-padding-small">
                        <span class="uk-badge bg-gray p210 uk-text-middle">Total Registros   <i uk-icon="icon: fa-solid-chevron-right; ratio: 0.6"></i>   <span id="lb_total_registros">0</span></span>
                        <button type="button" onClick="" class="uk-button uk-button-primary uk-button-small uk-align-right"><i uk-icon="print"></i>   <span class="uk-visible@s">Imprimir</span></button>  
                  </div>
              
            </div>
      </div>


      <div class="uk-width-3-5">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                   	<!--btns-->
                    <div uk-grid class="uk-grid-small">
                        <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                            <div class="uk-badge bg-gray p210 uk-text-middle">
                            	<span>ACTIVIDADES DE APRENDIZAJE </span>
                            </div>
                        </div>
                 
                        <div class="uk-width-1-2@s uk-padding-remove">
                            <input type="hidden" id="txt_fk_ud_usuario">
                            <div class="uk-float-right">
                                <a href="#" onClick="form_insertar_sesi();" class="uk-icon-link" uk-icon="plus-circle"></a>
                            </div>
                        </div>
                    </div>
                    <!--btns-->
                  </div>
                  
                  <div id="ct_form_body_sesi" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                        <!--contents-->
                  </div>
                  
                  <div class="uk-card-footer uk-padding-small">
                        <span class="uk-badge bg-gray p210 uk-text-middle">Total Registros   <i uk-icon="icon: fa-solid-chevron-right; ratio: 0.6"></i>   <span id="lb_total_registros">0</span></span>
                        <button type="button" onClick="" class="uk-button uk-button-primary uk-button-small uk-align-right"><i uk-icon="print"></i>   <span class="uk-visible@s">Imprimir</span></button>  
                  </div>
              
            </div>
      </div>
  
</div>

<?php
break; /*FIN DE MAIN*/
?>
<?php
case "new":
?>
 <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-small">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <input type="hidden" id="txt_fk_ud_2">
                        
                        <div class="uk-width-1-1@s">
                          <label>Seleccione Programa de Estudio:</label>
                          <select class="uk-select uk-form-small mayus" id="cb_prod_um">
                              <?php
                                  
                                  $ds=$general->listarSQL("SELECT * FROM menu where pk_menu in($privilegios) and menu_menu_grupo_fk=1");
                                  $n=1;
                                  while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                                      $pk_carrera=$fila['pk_menu'];
                                      if($n<2){
                                        $pk_carrera_uno=$pk_carrera;
                                      }
                                      ?>
                                      <option value="<?=$fila['pk_menu']?>" onClick="listar_uds('<?=$pk_carrera?>')"><?=$fila['menu_nombre']?></option>
                                  <?php 
                                  $n++;
                                  }//end while?>
                          </select>
                      </div>

                    <!--CAMPOS-->
        </div>
        
       </div>
    </div>

    <div class="uk-width-1-1@s">
        <div id="ct_form_body_uds" class="uk-card uk-card-default uk-card-body uk-padding-small" style="height:300px; overflow:auto">
             <!--CAMPOS-->
       </div>
    </div>
    
 </form>

<script>
    listar_uds('<?=$pk_carrera_uno?>')
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