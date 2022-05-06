<?php session_start();
if (isset($_SESSION['usua_login'])){ 
}else{
	header ("Location:index.php");
}
$pk_usuario_login=$_SESSION['pk_usuario'];
require_once("../model/UdUsuario.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="ud_usuario";
$tb_pk="pk_ud_usuario";
$prefijo_op="udus";
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
                <th data-campo="fk_usuario" class="uk-visible@s">PROGRAMA DE ESTUDIOS</th>
                <th data-campo="fk_usuario" class="uk-visible@s">TIPO</th>
				<th data-campo="fk_ud" class="uk-visible@s">UNIDAD DIDACTICA</th>				            
                <th width="50" data-campo="ud_semestre" class="uk-visible@s">SEMESTRE</th>
                <th width="50" data-campo="" class="uk-visible@s">MNTO</th>
	</tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php

			$condicion="fk_usuario='$pk_usuario_login'";
            $ds=$general->listarRegistros("ud_usuario inner join ud on fk_ud=pk_ud inner join menu on fk_carrera=pk_menu","ud_semestre","asc",1,$condicion);
		        	
			$tr=$ds->num_rows;
			if ($tr==0){
				echo "<td colspan='3'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                $pk_ud=$fila['pk_ud'];
                $pk_ud_usuario=$fila['pk_ud_usuario'];
				?>
				<tr onclick="pasar_pk_fila_lista('#txt_fk_ud',<?=$pk_ud;?>); listar_sesi();">
					<td class="tc bgn" width="30"><?=$n;?></td>
					<td class="uk-visible@s"><?=$fila['menu_nombre']?></td>
                    <td class="uk-visible@s"><?=ucfirst($fila['ud_tipo'])?></td>
					<td class="uk-visible@s"><?=$fila['ud_nombre']?></td>								
                    <td class="uk-visible@s tc"><?=$fila['ud_semestre']?></td>
                    <td class="uk-visible@s tc"><a href="#" onClick="form_eliminar_udus('<?=$pk_ud_usuario?>');" class="uk-icon-link" uk-icon="trash"></a></td>
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
case "listar_uds":
?>
<table id="tb_lista2" class="tb_lista" width="100%">
     <thead>
            <tr>
             			<th>N°</th>
				<th data-campo="ud_tipo" class="uk-visible@s">TIPO</th>
				<th data-campo="ud_nombre" class="uk-visible@s">NOMBRE DE UNIDAD DIDACTICA</th>
				<th data-campo="ud_semestre" class="uk-visible@s">SEMESTRE</th>				            
	    </tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php
		    $fk_carrera=$_POST['fk_carrera'];
            $condicion="fk_carrera='$fk_carrera'";
            $ds=$general->listarRegistros("ud","ud_semestre","asc",1,$condicion);
			$tr=$ds->num_rows;
			if ($tr==0){
				echo "<td colspan='6'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                $pk_ud=$fila['pk_ud'];
				?>
				<tr onclick="pasar_pk_fila_lista('#txt_fk_ud',<?=$pk_ud;?>)">
					<td class="tc bgn" width="30"><?=$n;?></td>
					<td class="uk-visible@s"><?=ucfirst($fila['ud_tipo'])?></td>
					<td class="uk-visible@s"><?=$fila['ud_nombre']?></td>
					<td class="uk-visible@s tc"><?=$fila['ud_semestre']?></td>								
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
<?php
break; /*FIN DE LIST*/
?>

<?php
/*INSERT*/
case "insert":
?>
<?php
$fk_usuario=$pk_usuario_login;
$fk_ud=$_POST['fk_ud'];
			
	$obj = new UdUsuario($fk_usuario,
						$fk_ud);
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
                        <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
                        	<?php /*--*/?>
                            <input type="hidden" name="pk_edit" id="txt_udus_pk" value="<?=$fila[$tb_pk]?>" />
                           	<?php /*--*/?>
                                <!--grid-->
                            <div class="uk-width-1-2@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        	<div class="uk-grid-small" uk-grid>
                                        	<!--campos-->
                                                <div class="uk-width-1-1">
                                                    <label>label:</label>
                                                    <input type="text" class="uk-input uk-form-small uk-width-1-1 mayus" id="txt_campo" value="" />
                                                </div>
                                            <!--campos--> 
                                         	</div>
                                   	</div>
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
$fk_usuario=$_POST['fk_usuario'];
$fk_ud=$_POST['fk_ud'];
			
	$obj = new UdUsuario($fk_usuario,
						$fk_ud);
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