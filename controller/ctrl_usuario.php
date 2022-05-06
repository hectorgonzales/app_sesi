<?php
require_once("../model/Usuario.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="usuario";
$tb_pk="pk_usuario";
$prefijo_op="usua";
$op=$_POST['op'];
switch($op){
?>
<?php
case "list":
?>
<table id="tb_lista" class="tb_lista" width="100%">
     	<thead>
            <tr>
                <th>N°</th>
 				<th data-campo="usua_usuario">USUARIO</th>
                <th data-campo="usua_login" class="uk-visible@s">LOGIN</th>
                <th data-campo="usua_estado" class="uk-visible@s">ESTADO</th>
                <th data-campo="usua_tipo" class="uk-visible@s">TIPO</th>
                <th data-campo="usua_fecha_creacion" class="uk-visible@s">FECHA CREA.</th>
            </tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php
		$txt=$_POST['txt'];
        $campo=$_POST['campo'];        
			if(trim($txt)==""){
				$ds=$general->listarRegistros($tb,$tb_pk);
			}else{
				$ds=$general->listarBuscar($tb,$campo,$txt);
			}			        	
			$tr=$ds->num_rows;
			if ($tr==0){
				echo "<td colspan='10'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
					$estado=($fila['usua_estado']==2)?"ACTIVO":"INACTIVO";
					$tipo=($fila['usua_tipo']==1)?"USUARIO":"ADMINISTRADOR";
				?>
				<tr <?php if($fila['usua_estado']=="1"){echo "class='td_inactivo'";}?> id="fila<?=$fila[$tb_pk];?>" onDblClick="hacer_clic('#frm_bt_modificar_<?=$prefijo_op;?>');" onClick="pasar_pk_fila_lista('#txt_pk_hidden',<?=$fila[$tb_pk];?>)">
					<td class="tc bgn" width="30"><?=$n;?></td>
					<td><?=$fila['usua_usuario']?></td>
                    <td class="uk-visible@s"><?=$fila['usua_login']?></td>
                    <td class="uk-visible@s"><?=$estado?></td>
                    <td class="uk-visible@s"><?=$tipo?></td>
                    <td class="tc uk-visible@s"><?=date("d/m/Y - H:i:s",strtotime($fila['usua_fecha_creacion']))?></td>
				</tr>               
				<?php
				$n++;
				} //fin while
			} //fin si
			?>
    </tbody>
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
/*BUSCAR SI EXISTE LOGIN*/
case "buscar_si_existe":
?>
<?php
	$login=$_POST['login'];
	$condicion="usua_login='$login'";
	echo $general->existenRegitros($tb,"1",$condicion);
?>  
<?php
break;
?>

<?php
/*INSERT*/
case "insert":
?>
<?php
	$usua_tipo=$_POST['usua_tipo'];
	$usua_usuario=$_POST['usua_usuario'];
	$usua_login=$_POST['usua_login'];
	$usua_password=strtoupper(sha1($_POST['usua_password']));
	$usua_estado=$_POST['usua_estado'];
	$usua_estado=($usua_estado=="false") ? "1" : "2";	
	
	$a_privilegios="";
	if(isset($_POST['usua_privilegios'])){
	$privilegios=$_POST['usua_privilegios'];
	$t_privilegios=count($privilegios);
	sort($privilegios);
		for($i=0;$i<$t_privilegios;$i++){
			$a_privilegios.=$privilegios[$i].",";
		}
		$a_privilegios = substr($a_privilegios, 0, -1);
	}
	$usua_privilegios=$a_privilegios;
	
	$usua_fecha_creacion=date("Y-m-d h:i:s");

		
	$obj = new Usuario($usua_usuario,$usua_login,$usua_password,$usua_estado,$usua_tipo,$usua_privilegios,$usua_fecha_creacion);
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

<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                  	<div class="uk-badge bg-gray p210 uk-text-middle">
                  		<span><?=BT_EDIT;?> MODIFICAR</span>
                  	</div>
                  </div>

                  <div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">


                       <!--form-->
                            <!--grid-->
                             <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
								 <?php /*--*/?>
                                 <input type="hidden" name="pk_edit" id="txt_usuario_pk" value="<?=$fila[$tb_pk]?>" />
                                 <?php /*--*/?>
                                 
                             	<div class="uk-width-1-2@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        <div class="uk-grid-small" uk-grid>
                                        
                                            <div class="uk-width-1-1">
                                                <label>Nombre de Usuario:</label>
                                                <input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_usua_usuario" value="<?=$fila['usua_usuario']?>" />
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Login:</label>
                                                <input type="text" class="uk-input uk-form-small" id="txt_usua_login" value="<?=$fila['usua_login']?>" />
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label>Password:</label>
                                                <input type="password" class="uk-input uk-form-small" id="txt_pass1" value="_password_" />
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label>Repita el Password:</label>
                                                <input type="password" class="uk-input uk-form-small" id="txt_pass2" value="_password_" />
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Tipo de Usuario:</label>
                                                <select id="cb_usua_tipo" class="uk-select uk-form-small">
                                                    <option value="1" <?php if($fila['usua_tipo']=='1'){echo "selected";}?>>USUARIO</option>
                                                    <option value="2" <?php if($fila['usua_tipo']=='2'){echo "selected";}?>>ADMINISTRADOR</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-1-1">
                                                <label>Estado:</label>
                                                   <input type="radio" class="uk-rasdio" id="rb_activo" name="rb_usua_estado" <?php if($fila['usua_estado']=='2'){echo "checked='checked'";}?> /> <label>Activo</label> &nbsp;
                                                   <input type="radio" class="uk-rasdio" id="rb_inactivo" name="rb_usua_estado" <?php if($fila['usua_estado']=='1'){echo "checked='checked'";}?> /> <label class="uk-text-danger">Inactivo</label>
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
                                                  $privilegios=$fila['usua_privilegios'];
                                                  $array_menu=preg_split('[,]', $privilegios);
                                                  $t_am=count($array_menu);
                                                  ?>
                                                  <?php
                                                  $ds=$general->listarRegistros("menu","menu_orden","asc");		        	
                                                  while($fila=$ds->fetch_array(MYSQLI_ASSOC)){?>
                                                    <li><input type="checkbox" <?php for($m=0;$m<$t_am;$m++){if($array_menu[$m]==$fila['pk_menu']){;?>checked="checked" <?php };}?> name="privilegios[]" value="<?=$fila['pk_menu']?>" /> <?=$fila['menu_nombre']?></li>
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
                        <button type="button" value="Submit" onClick="validaForm_<?=$prefijo_op;?>(2);" class="uk-button uk-button-primary uk-button-small"><i uk-icon="check"></i> &nbsp; Actualizar</button> 
                        <span uk-alert class="uk-alert-danger uk-margin-remove uk-padding-remove fs10" style="display:none" id="frm_msg_error"></span>
                  </div> 
                  <!--footer-->
              
            </div>
      </div>
  
</div>


<script type="text/javascript">
campos_enter();
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

$usua_tipo=$_POST['usua_tipo'];

	$usua_usuario=$_POST['usua_usuario'];
	$usua_login=$_POST['usua_login'];
	$usua_password=$_POST['usua_password'];
	$usua_estado=$_POST['usua_estado'];
	$usua_estado=($usua_estado=="false") ? "1" : "2";	
	
	$a_privilegios="";
	if(isset($_POST['usua_privilegios'])){
	$privilegios=$_POST['usua_privilegios'];
	$t_privilegios=count($privilegios);
	sort($privilegios);
		for($i=0;$i<$t_privilegios;$i++){
			$a_privilegios.=$privilegios[$i].",";
		}
		$a_privilegios = substr($a_privilegios, 0, -1);
	}
	$usua_privilegios=$a_privilegios;

	
	if($usua_password=="_password_"){
		$obj = new Usuario($usua_usuario,$usua_login,$usua_password,$usua_estado,$usua_tipo,$usua_privilegios,$usua_fecha_creacion);
		$obj->actualizar($pk,"1"); // 1- sin password
	}else{
		$usua_password=strtoupper(sha1($_POST['usua_password']));
		$obj = new Usuario($usua_usuario,$usua_login,$usua_password,$usua_estado,$usua_tipo,$usua_privilegios,$usua_fecha_creacion);
		$obj->actualizar($pk);
	}
	
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
case "actualizar_password": //disparador en persson.js
//OJO NO CONTROLA PASS EN BLANCO
?>
<?php
$login=$_POST['login'];
$password=$_POST['pass_a'];
$pass=sha1($password);
$pass=strtoupper($pass);

$condicion="usua_login='$login' AND usua_password='$pass'";
$ds=$general->listarRegistros("usuario","pk_usuario","asc",1,$condicion);			        	
$tr=$ds->num_rows;

if($tr>0){
	$pass1=$_POST['pass_1'];
	$pass2=$_POST['pass_2'];
	if($pass1==$pass2){
		$pass_nuevo=sha1($pass1);
		$pass_nuevo=strtoupper($pass_nuevo);
		$modificado=$general->modificarCampos("usuario","usua_password='$pass_nuevo'",1,$condicion);
		if($modificado=="1"){
			echo "<div uk-alert class='uk-alert-success'>El nuevo password se cambio correctamente.</div>";
		}else{
			echo "<div uk-alert class='uk-alert-danger'>No se pudo modificar el password.</div>";
		}
	}else{
		echo "<div uk-alert class='uk-alert-danger'>Los nuevos password no coinciden, vuelva a intentarlo.</div>";	
	}
}else{
	echo "<div uk-alert class='uk-alert-danger'>El password actual no coincide, vuelva a intentarlo.</div>";
}
?>  
<?php
break;
?>

<?php
} /*FIN SWITCH*/
?>