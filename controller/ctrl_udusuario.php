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
                <th data-campo="fk_usuario" class="uk-visible@s uk-visible@l">PROGRAMA DE ESTUDIOS</th>
                <th data-campo="fk_usuario" class="uk-visible@l">TIPO</th>
				<th data-campo="fk_ud" class="">UNIDAD DIDACTICA</th>				            
                <th width="30" data-campo="ud_semestre" class="uk-visible@s uk-visible@l">SEM</th>
                <th width="30" data-campo="" class="">E</th>
	</tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php

			$condicion="fk_usuario='$pk_usuario_login'";
            $ds=$general->listarRegistros("ud_usuario inner join ud on fk_ud=pk_ud inner join menu on fk_carrera=pk_menu","ud_semestre","asc",1,$condicion);
		        	
			$tr=$ds->num_rows;
			if ($tr==0){
				echo "<td colspan='6'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                $pk_ud=$fila['pk_ud'];
                $pk_ud_usuario=$fila['pk_ud_usuario'];
				?>
				<tr  id="fila<?=$fila[$tb_pk];?>" onclick="pasar_pk_fila_lista('#txt_fk_ud_usuario',<?=$pk_ud_usuario;?>); listar_sesi();">
					<td class="tc bgn" width="30"><?=$n;?></td>
					<td class="uk-visible@s uk-visible@l"><?=$fila['menu_nombre']?></td>
                    <td class="uk-visible@l"><?=ucfirst($fila['ud_tipo'])?></td>
					<td class=""><?=$fila['ud_nombre']?></td>								
                    <td class="uk-visible@s uk-visible@l tc"><?=$fila['ud_semestre']?></td>
                    <td class="tc"><a href="#" onClick="form_eliminar_udus('<?=$pk_ud_usuario?>');" class="uk-icon-link" uk-icon="trash" uk-tooltip="Eliminar"></a></td>
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
				<tr onclick="pasar_pk_fila_lista('#txt_fk_ud_2',<?=$pk_ud;?>)">
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
case "delete":
?>
<?php
	$pk=$_POST['pk'];		
	$general->eliminarRegistro($tb,$tb_pk,$pk);	
    
    $condicion="fk_usuario='$pk_usuario_login' AND fk_ud='$pk'";
    $general->eliminarRegistro("sesion","pk","0",1,$condicion);	
    
?>
<?php
break; /* END DELETE*/
?>
<?php
} /*FIN SWITCH*/
?>