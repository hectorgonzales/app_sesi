
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="modu";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php
case "new":
?>
 <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body uk-padding-small">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Nombre de Modulo:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_modu_nombre"></textarea>
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
case "main_competencias":
$pk_modulo=$_POST['pk_modulo'];
$fk_carrera=$_POST['fk_carrera'];
$menu_atras="#menu_bt_$fk_carrera";
$modulo=$general->valorCampo("modulo","modu_nombre","pk_modulo='$pk_modulo'");
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  
                  <div class="uk-card-header uk-padding-small bg-card-header-1">
                          <!--btns-->
                            <div uk-grid class="uk-grid-small">  
                                                         
                                <div class="uk-width-1-1 p-t4">
                                    <input type="hidden" id="txt_fk_modulo" value="<?=$pk_modulo?>">
                               		 <div class="uk-badge uk-label-success">
                                          <span class="txt-white p210 uk-text-middle uk-text-small"><?=$modulo?></span>
                                      </div>
                                     <div class="uk-badge uk-label-warning">
                                          <span class="txt-white p210 uk-text-middle uk-text-small">Competencias</span>
                                      </div>
                                </div>
                            </div>
                          <!--btns-->                          
                   </div>

                  
                  <div id="ct_form_body" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                        <div uk-grid class="uk-grid-small uk-height-1-1">
                             <!--izq-->
                            <div class="uk-width-1-2">
                               
                                    <div class="uk-card uk-card-default uk-height-1-1">
                                         <div class="uk-card-header bg-card-header-1 uk-padding-small">
                                            <!--btns-->
                                            <div uk-grid class="uk-grid-small">
                                                <div class="uk-width-1-3@s p-t4 uk-text-left@s uk-visible@s">
                                                    <div class="uk-badge bg-gray p210 uk-text-middle">
                                                        <span>COMPETENCIAS ESPECIFICAS</span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-3@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <a href="#" onClick="form_nuevo_coes();" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-3@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <button onClick="main_ud('<?=$pk_modulo?>','especifica');" class="uk-button uk-button-primary uk-button-small">
                                                            <i uk-icon="icon: fa-solid-file; ratio: 0.6"></i> <span class="uk-visible@s"></span> VER UNIDADES DIDACTICAS
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--btns-->
                                          </div>

                                          <div id="ct_form_body_coes" class="uk-overflow-auto uk-padding-small">
                                                <!--contents-->
                                          </div>

                                    </div>
                                    
                            </div>
                            <!--izq-->
                            
                            <!--der-->
                            <div class="uk-width-1-2">

                                    <div class="uk-card uk-card-default uk-height-1-1">
                                         <div class="uk-card-header bg-card-header-1 uk-padding-small">
                                            <!--btns-->
                                            <div uk-grid class="uk-grid-small">
                                                <div class="uk-width-1-3@s p-t4 uk-text-left@s uk-visible@s">
                                                    <div class="uk-badge bg-gray p210 uk-text-middle">
                                                        <span>COMPETENCIAS PARA LA EMPLEABILIDAD</span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-3@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <a href="#" onClick="form_nuevo_coem();" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-3@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <button onClick="main_ud('<?=$pk_modulo?>','empleabilidad');" class="uk-button uk-button-primary uk-button-small">
                                                            <i uk-icon="icon: fa-solid-file; ratio: 0.6"></i> <span class="uk-visible@s"></span> VER UNIDADES DIDACTICAS
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--btns-->
                                          </div>

                                          <div id="ct_form_body_coem" class="uk-overflow-auto uk-padding-small">
                                                <!--contents-->
                                          </div>

                                    </div>
                            </div>
                            <!--der-->
                        </div>
                  </div>
                  
                  <div class="uk-card-footer uk-padding-small">
                  	<button type="button" onclick="hacer_clic('<?=$menu_atras?>');" class="uk-button uk-button-danger"><i uk-icon="chevron-left"></i> &nbsp; <span class="uk-visible@s">Atras</span></button>
                    <button type="button" onclick="hacer_clic('<?=$menu_atras?>');" class="uk-button uk-button-default uk-margin-small-left"><i uk-icon="reply"></i> &nbsp; <span class="uk-visible@s">Cancelar</span></button>
                  </div>
              
            </div>
      </div>
  
</div>
<?php
break; /*FIN DE MAIN*/
?>
<?php
case "main_ud":
$fk_modulo=$_POST['fk_modulo'];
$competencia=$_POST['competencia'];
$menu_atras="#menu_bt_$fk_modulo";
$modulo=$general->valorCampo("modulo","modu_nombre","pk_modulo='$fk_modulo'");
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  
                  <div class="uk-card-header uk-padding-small bg-card-header-1">
                          <!--btns-->
                            <div uk-grid class="uk-grid-small">  
                                                         
                                <div class="uk-width-1-1 p-t4">
                                    <input type="hidden" id="txt_fk_modulo" value="<?=$fk_modulo?>">
                                    <input type="hidden" id="txt_ud_tipo" value="<?=$competencia?>">
                                    
                               		 <div class="uk-badge uk-label-success">
                                          <span class="txt-white p210 uk-text-middle uk-text-small"><?=$modulo?></span>
                                      </div>
                                     <div class="uk-badge uk-label-warning">
                                          <span class="txt-white p210 uk-text-middle uk-text-small">Competencias</span>
                                      </div>                                      
                                     <div class="uk-badge uk-label-danger">
                                          <span class="txt-white p210 uk-text-middle uk-text-small">Unidades Didacticas</span>
                                      </div>
                                </div>
                            </div>
                          <!--btns-->                          
                   </div>

                  
                  <div id="ct_form_body" class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                        <div uk-grid class="uk-grid-small uk-height-1-1">
                             <!--izq-->
                            <div class="uk-width-1-3">
                               
                                    <div class="uk-card uk-card-default uk-height-1-1">
                                         <div class="uk-card-header bg-card-header-1 uk-padding-small">
                                            <!--btns-->
                                            <div uk-grid class="uk-grid-small">
                                                <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                                                    <div class="uk-badge bg-gray p210 uk-text-middle">
                                                        <span>UNIDADES DIDACTICAS</span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-2@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <a href="#" onClick="form_nuevo_ud();" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--btns-->
                                          </div>

                                          <div id="ct_form_body_ud" class="uk-overflow-auto uk-padding-small">
                                                <!--contents-->
                                          </div>

                                    </div>
                                    
                            </div>
                            <!--izq-->
                            
                            <!--der-->
                            <div class="uk-width-1-3">

                                    <div class="uk-card uk-card-default uk-height-1-1">
                                         <div class="uk-card-header bg-card-header-1 uk-padding-small">
                                            <!--btns-->
                                            <div uk-grid class="uk-grid-small">
                                                <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                                                    <input type="hidden" id="txt_fk_ud">
                                                    <div class="uk-badge bg-gray p210 uk-text-middle">
                                                        <span>CAPACIDADES</span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-2@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <a href="#" onClick="form_nuevo_capa();" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--btns-->
                                          </div>

                                          <div id="ct_form_body_capa" class="uk-overflow-auto uk-padding-small">
                                                <!--contents-->
                                          </div>

                                    </div>
                            </div>
                            <!--der-->

                            <!--der-->
                            <div class="uk-width-1-3">

                                    <div class="uk-card uk-card-default uk-height-1-1">
                                         <div class="uk-card-header bg-card-header-1 uk-padding-small">
                                            <!--btns-->
                                            <div uk-grid class="uk-grid-small">
                                                <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                                                    <input type="hidden" id="txt_fk_capacidad">
                                                    <div class="uk-badge bg-gray p210 uk-text-middle">
                                                        <span>INDICADORES DE LOGRO</span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-2@s uk-padding-remove">
                                                    <div class="uk-float-right">
                                                        <a href="#" onClick="form_nuevo_calo();" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--btns-->
                                          </div>

                                          <div id="ct_form_body_calo" class="uk-overflow-auto uk-padding-small">
                                                <!--contents-->
                                          </div>

                                    </div>
                            </div>
                            <!--der-->
                            
                        </div>
                  </div>
                  
                  <div class="uk-card-footer uk-padding-small">
                  	<button type="button" onclick="main_competencias('<?=$fk_modulo?>');" class="uk-button uk-button-danger"><i uk-icon="chevron-left"></i> &nbsp; <span class="uk-visible@s">Atras</span></button>
                    <button type="button" onclick="main_competencias(('<?=$fk_modulo?>');" class="uk-button uk-button-default uk-margin-small-left"><i uk-icon="reply"></i> &nbsp; <span class="uk-visible@s">Cancelar</span></button>
                  </div>
              
            </div>
      </div>
  
</div>


<?php
break; /*FIN DE MAIN*/
?>

<?php
} /*FIN SWITCH*/
?>
