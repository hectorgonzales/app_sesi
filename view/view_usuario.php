<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="usua";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php
case "main":
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                   	<!--btns-->
                    <div uk-grid class="uk-grid-small">
                        <div class="uk-width-1-2@s p-t4 uk-text-left@s uk-visible@s">
                            <div class="uk-badge bg-gray p210 uk-text-middle">
                            	<span><?=BT_LIST;?> LISTA</span>
                            </div>
                        </div>
                 
                        <div class="uk-width-1-2@s uk-padding-remove">
                            <div>
                            	<input type="hidden" id="txt_pk_hidden" /><?php //<-- HID PK?>                                
								<input type="hidden" id="box_txt_buscar_campo" value="campo_inicial" /><?php //<-- HID CAMPO BUSCAR?>                                
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                                    <input class="uk-input uk-form-small" placeholder="Buscar" name="box_txt_buscar" id="box_txt_buscar"  />
                                </div>
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
  
</div>


<script>  
$('#box_txt_buscar').on('keydown', function(e) {
    if (e.which == 13) {
		listar_usua();
    }
});
</script>

<?php
break; //fin de main
?>
<?php
case "new":
?>

<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                  	<div class="uk-badge bg-gray p210 uk-text-middle">
                  		<span><?=BT_NEW;?> NUEVO</span>
                    </div>
                  </div>

                  <div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">

                        <!--form-->
                            <!--grid-->
                             <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
                             	<div class="uk-width-1-2@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        <div class="uk-grid-small" uk-grid>
                                        
                                            <div class="uk-width-1-1">
                                                <label>Nombre de Usuario:</label>
                                                <input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_usua_usuario" />
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Login:</label>
                                                <input type="text" class="uk-input uk-form-small" id="txt_usua_login" />
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label>Password:</label>
                                                <input type="password" class="uk-input uk-form-small" id="txt_pass1" />
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label>Repita el Password:</label>
                                                <input type="password" class="uk-input uk-form-small" id="txt_pass2" />
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Tipo de Usuario:</label>
                                                <select id="cb_usua_tipo" class="uk-select uk-form-small">
                                                    <option value="1">USUARIO</option>
                                                    <option value="2">ADMINISTRADOR</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Estado:</label>
                                                   <input type="radio" class="uk-rasdio" id="rb_activo" name="rb_usua_estado" checked="checked" /> <label>Activo</label> &nbsp;
                                                   <input type="radio" class="uk-rasdio" id="rb_inactivo" name="rb_usua_estado" /> <label class="uk-text-danger">Inactivo</label>
                                            </div>
                                            
                                         </div>
                                   </div>
                                </div>
                                
                                <div class="uk-width-1-2@s">
                                  <!--PRIVILEGIOS-->
                                      <div class="uk-card uk-card-default">
                                          <div class="uk-card-header uk-padding-small">
                                              <label>Privilegios del Usuario</label>
                                              <div class="uk-float-right">
                                                  <a href="#" class="uk-icon-link uk-margin-small-right" onclick="deseleccionar_checks('#lst_privilegios')" uk-icon="fa-square"></a>
                                                  <a href="#" class="uk-icon-link uk-margin-small-right" onclick="seleccionar_checks('#lst_privilegios')" uk-icon="fa-check-square"></a>
                                              </div>
                                          </div>
                                          <div class="uk-card-body">
                                              <ul id="lst_privilegios" class="uk-list uk-list-collapse uk-list-divider fs10">
                                              <?php
                                                  $ds=$general->listarRegistros("menu","menu_orden","asc");		        	
                                                  while($fila=$ds->fetch_array(MYSQLI_ASSOC)){?>
                                                    <li><input type="checkbox" name="privilegios[]" value="<?=$fila['pk_menu']?>" /> <?=$fila['menu_nombre']?></li>
                                              <?php
                                              }?>  
                                             </ul>    
                                          </div>
                                      </div>
                                  <!--PRIVILEGIOS-->      
                               </div>
                               
                            <!--grid-->
                       		 </form>
                        <!--form-->
                  </div><!--card body-->
                  <!--footer-->
                  <div class="uk-card-footer uk-padding-small">
                        <button type="button" onClick="hacer_clic('#frm_bt_lista_<?=$prefijo_op;?>');" class="uk-button uk-button-default uk-button-small"><i uk-icon="reply"></i> &nbsp; <span class="uk-visible@s">Cancelar</span></button>        
                        <button type="button" value="Submit" onClick="validaForm_<?=$prefijo_op;?>(1);" class="uk-button uk-button-primary uk-button-small"><i uk-icon="check"></i> &nbsp; Guardar</button>
                        <span uk-alert class="uk-alert-danger uk-margin-remove uk-padding-remove fs10" style="display:none" id="frm_msg_error"></span>  
                  </div> 
                  <!--footer-->           
            </div>
      </div>
  
</div>


<?php
break; //fin de new
?>


<?php
case "cambiar_password": //lanzador esta en persson.js
//===============NUEVO===============================
?> 
   <!--form-->
    <form class="uk-form">
        <!--grid-->
        <div uk-grid class="uk-grid-small uk-grid-match">
            
            <div class="uk-width-1-1">

                        <table border="0" width="100%">
                            <tr><td><label>Usuario:</label></td></tr>
                            <tr><td>
                                <input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_usua_usuario" value="<?=$_SESSION['usua_usuario'];?>" readonly="readonly" />
                                <input type="hidden" value="<?=$_SESSION['usua_login'];?>" id="frm_user_pass_txt_login">
                            </td></tr>
                            <tr><td><label>Password Actual:</label></td></tr>
                            <tr><td><input type="password" class="uk-input uk-form-small uk-form-success uk-width-1-1" id="frm_user_pass_txt_actual" /></td></tr>
                            <tr><td><label>Nuevo Password:</label></td></tr>
                            <tr><td><input type="password" class="uk-input uk-form-small uk-width-1-1" id="frm_user_pass_txt_n_pass1" /></td></tr>
                            <tr><td><label>Repite nuevo Password:</label></td></tr>
                            <tr><td><input type="password" class="uk-input uk-form-small uk-width-1-1" id="frm_user_pass_txt_n_pass2" /></td></tr>
                            <tr><td id="frm_user_pass_msg"></td></tr>
                            
                        </table>

            </div>
            
        </div>
        <!--grid-->
        
    </form>
    <!--form-->
<?php
break;
?>


<?php
} //fin de switch
?>

<script type="text/javascript">
	campos_enter();
</script>