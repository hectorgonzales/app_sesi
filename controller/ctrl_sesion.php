<?php session_start();
if (isset($_SESSION['usua_login'])){ 
}else{
	header ("Location:index.php");
}
$pk_usuario_login=$_SESSION['pk_usuario'];
$usuario_nombre_login=$_SESSION['usua_usuario'];
require_once("../model/Sesion.php");
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
$tb="sesion";
$tb_pk="pk_sesion";
$prefijo_op="sesi";
$op=$_POST['op'];
switch($op){
?>
<?php
case "list":
?>
<table id="tb_lista3" class="tb_lista" width="100%">
     <thead>
            <tr>
            <th>N°</th>
			<th data-campo="sesi_ud" class="uk-visible@s">SESI_UD</th>
			            
	    </tr>
        </thead>
    <!--Table body-->        
    <tbody>
    	<?php
		$fk_ud=$_POST['fk_ud'];
        $condicion="fk_ud='$fk_ud'";        
			$ds=$general->listarRegistros($tb,$tb_pk,"desc",1,$condicion);
				
			$tr=$ds->num_rows;
			if ($tr==0){
				echo "<td colspan='32'><div class=\"uk-alert uk-alert-warning uk-margin-top uk-margin-left uk-margin-right\"> No se encontraron registros. </div></td></tr>";
			}else{
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
                $pk_sesion=$fila['pk_sesion'];
				?>
				<tr>
					<td class="tc bgn" width="30"><?=$n;?></td>
					<td class="uk-visible@s"><?=$fila['sesi_ud']?></td>
                    <td class="uk-visible@s tc"><a href="#" onClick="info_general('<?=$pk_sesion?>');"><i uk-icon="icon: info; ratio: 0.7"></i> Inf. General </a></td>
                    <td class="uk-visible@s tc"><a href="#"><i uk-icon="icon: list; ratio: 0.7"></i> Planificación </a></td>
                    <td class="uk-visible@s tc"><a href="#"><i uk-icon="icon: settings; ratio: 0.7"></i> Secuencia </a></td>
                    <td class="uk-visible@s tc"><a href="#"><i uk-icon="icon: thumbnails; ratio: 0.7"></i> Eva/Biblio </a></td>
								
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
/*INSERT*/
case "insert":
?>
<?php
//==ud-carrera
$fk_ud=$_POST['fk_ud'];
$ds_ud=$general->modificarRegistro("ud inner join menu on fk_carrera=pk_menu","pk_ud",$fk_ud);
$fila_ud=$ds_ud->fetch_assoc();
        $fk_carrera=$fila_ud['fk_carrera'];
        $carrera=$fila_ud['menu_nombre'];
        $fk_modulo=$fila_ud['fk_modulo'];
        $ud_nombre=$fila_ud['ud_nombre'];
        $ud_horas=$fila_ud['ud_horas'];
        $ud_horas_min=$ud_horas*60;
        $ud_semestre=$fila_ud['ud_semestre'];
            $periodo="I";
            switch($ud_semestre){
                case "I":
                case "III":
                case "V":
                $periodo="I";
                break;
                
                case "II":
                case "IV":
                case "VI":
                $periodo="II";
                break;
            }

//==modulo
$modu_nombre=$general->valorCampo("modulo","modu_nombre","pk_modulo='$fk_modulo'");

//==competencia especifica
$condicion_coes="fk_modulo='$fk_modulo'";
$ds_coes=$general->listarRegistros("competencia_especifica","pk_competencia_especifica","asc",1,$condicion_coes);                                               
$fila_coes=$ds_coes->fetch_assoc();
        $pk_competencia_especifica=$fila_coes['pk_competencia_especifica'];
        $coes_descripcion=$fila_coes['coes_descripcion'];

//==competencia Empleabilidad
$condicion_coem="fk_modulo='$fk_modulo'";
$ds_coem=$general->listarRegistros("competencia_empleabilidad","pk_competencia_empleabilidad","asc",1,$condicion_coem);                                               
$fila_coem=$ds_coem->fetch_assoc();
        $pk_competencia_empleabilidad=$fila_coem['pk_competencia_empleabilidad'];
        $coem_descripcion=$fila_coem['coem_descripcion'];
        
//==capacidad tecnica
$condicion_cap="fk_ud='$fk_ud'";
$ds_capacidad=$general->listarRegistros("capacidad","pk_capacidad","asc",1,$condicion_cap);                                               
$fila_capacidad=$ds_capacidad->fetch_assoc();
        $pk_capacidad=$fila_capacidad['pk_capacidad'];
        $capa_descripcion=$fila_capacidad['capa_descripcion'];
        
//==indicador logro
$condicion_calo="fk_capacidad='$pk_capacidad'";
$ds_calo=$general->listarRegistros("capacidad_logro","pk_capacidad_logro","asc",1,$condicion_calo);                                               
$fila_calo=$ds_calo->fetch_assoc();
        $pk_capacidad_logro=$fila_calo['pk_capacidad_logro'];
        $calo_descripcion=$fila_calo['calo_descripcion'];
        

$fk_usuario=$pk_usuario_login;
$fk_ud=$_POST['fk_ud'];
$sesi_docente=addslashes($usuario_nombre_login);
$sesi_anio=date("Y");
$sesi_periodo=$periodo;
$sesi_horas=$ud_horas;
$sesi_hora_sincrona=$ud_horas_min;
$sesi_hora_asincrona=0;
$sesi_carrera=addslashes($carrera);
$fks_competencia_especifica=$pk_competencia_especifica;
$sesi_comp_especifica=addslashes($coes_descripcion);
$fks_competencia_empleabilidad=$pk_competencia_empleabilidad;
$sesi_comp_empleabilidad=addslashes($coem_descripcion);
$fk_modulo=$fk_modulo;
$sesi_modulo=addslashes($modu_nombre);
$sesi_ud=addslashes($ud_nombre);
$fks_capacidad=$pk_capacidad;
$sesi_capacidad=addslashes($capa_descripcion);
$fks_capacidad_logro=$pk_capacidad_logro;
$sesi_capacidad_logro=addslashes($calo_descripcion);
$sesi_tema="";
$sesi_act_practico=0;
$sesi_act_teopractico=1;
$sesi_tipo_presencial=1;
$sesi_tipo_virtsincrono=0;
$sesi_tipo_virtasincrono=0;
$sesi_fecha=date("Y-m-d");
$plap_indicador_competencia=addslashes($calo_descripcion);
$plap_indicador_capacidad="";
$plap_logro_sesion="";
$inicio_estrategia="Actividad focal introductoria.";
$desarrollo_estrategia="Organizador visual.";
$cierre_estrategia="Síntesis, reflexión de los aprendizajes.";
$eva_indicador_logro="";
$eva_tecnicas="Observación";
$eva_instrumentos="Lista de Cotejo";
$eva_peso="100%";
$eva_momento="Cierre";
$biblio_docente="";
$biblio_estudiante="";
			
	$obj = new Sesion($fk_usuario,
						$fk_ud,
						$sesi_docente,
						$sesi_anio,
						$sesi_periodo,
                        $sesi_horas,
						$sesi_hora_sincrona,
						$sesi_hora_asincrona,
						$sesi_carrera,
                        $fks_competencia_especifica,
						$sesi_comp_especifica,
                        $fks_competencia_empleabilidad,
						$sesi_comp_empleabilidad,
                        $fk_modulo,
						$sesi_modulo,
						$sesi_ud,
                        $fks_capacidad,
						$sesi_capacidad,
                        $fks_capacidad_logro,
						$sesi_capacidad_logro,
						$sesi_tema,
						$sesi_act_practico,
						$sesi_act_teopractico,
						$sesi_tipo_presencial,
						$sesi_tipo_virtsincrono,
						$sesi_tipo_virtasincrono,
						$sesi_fecha,
						$plap_indicador_competencia,
						$plap_indicador_capacidad,
						$plap_logro_sesion,
                        $inicio_estrategia,
                        $desarrollo_estrategia,
                        $cierre_estrategia,
						$eva_indicador_logro,
						$eva_tecnicas,
						$eva_instrumentos,
						$eva_peso,
						$eva_momento,
						$biblio_docente,
						$biblio_estudiante);
  	$obj->insertar();
?>
<?php
break; //FIN DE INSERT
?>


<?php
/*NEW*/
case "info_general":
?>
<?php
$pk=$_POST['pk'];
$ds=$general->modificarRegistro($tb,$tb_pk,$pk);
$fila=$ds->fetch_assoc();

$fk_ud=$fila['fk_ud'];
$fk_modulo=$fila['fk_modulo'];
?>
<div uk-grid>
  
      <div class="uk-width-1-1">
            <div class="uk-card uk-card-default">
                  <div class="uk-card-header bg-card-header-1 uk-padding-small">
                  	<div class="uk-badge bg-gray p210 uk-text-middle">
                  		<span>INFORMACIÓN GENERAL</span>
                    </div>
                  </div>

                  <div class="uk-card-body height-100 uk-overflow-auto uk-padding-small" uk-height-viewport="offset-top: true; offset-bottom:1">
                              <?php /*--*/?>
                                <input type="hidden" name="pk_edit" id="txt_sesi_pk" value="<?=$fila[$tb_pk]?>" />
                           	<?php /*--*/?>
                         <!--form-->
                            <!--grid-->
                             <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
                             	<div class="uk-width-2-3@s">
                                	<div class="uk-card uk-card-default uk-card-body">
                                        <div class="uk-grid-small" uk-grid>
                                                
                                        		<!--CAMPOS-->                                            
                                                <div class="uk-width-1-1">
                                                    <h4 class="uk-text-muted uk-background-muted">INFORMACIÓN GENERAL</h4>
                                                </div>                                                
                                                <div class="uk-width-1-4">
                                                    <label>Fecha de desarrollo:</label>
                                                    <input type="date" class="uk-input uk-form-small" id="txt_sesi_fecha" value="<?=$fila['sesi_fecha']?>" />
                                                </div>                                                
                                                <div class="uk-width-1-4">
                                                    <label>Total de Horas Actividad:</label>
                                                    <select class="uk-select uk-form-small" id="txt_sesi_horas" >
                                                        <?php
                                                        for($hs=1;$hs<11;$hs++){
                                                        ?>
                                                            <option onClick="cambiar_hora_sincrona();" <?php if($fila['sesi_horas']==$hs){echo "selected='selected'";}?>><?=$hs?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label>Hora sincrona (Min.):</label>
                                                    <input type="text" class="uk-input uk-form-small mayus" id="txt_sesi_hora_sincrona" disabled value="<?=$fila['sesi_hora_sincrona']?>" />
                                                </div>
                                                <div class="uk-width-1-4">
                                                    <label>Hora asincrona (Min.):</label>
                                                    <select class="uk-select uk-form-small mayus" id="txt_sesi_hora_asincrona" >
                                                        <?php
                                                        for($h=0;$h<481;$h+=30){
                                                        ?>
                                                            <option onClick="cambiar_hora_sincrona();" <?php if($fila['sesi_hora_asincrona']==$h){echo "selected='selected'";}?>><?=$h?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="uk-width-1-3@s">
                                                    <label>Actividades de tipo:</label>
                                                    <table border="0" style="border:1px solid #ccc" width="100%">
                                                        <td>
                                                        <input type="checkbox" <?php if($fila['sesi_act_practico']==1){echo "checked";}?> id="txt_sesi_act_practico" /> Practico
                                                        </td>
                                                        <td>
                                                        <input type="checkbox" <?php if($fila['sesi_act_teopractico']==1){echo "checked";}?> id="txt_sesi_act_teopractico"  /> Teórico Practico
                                                        </td>
                                                    </table>
                                                </div>
                                                <div class="uk-width-2-3@s">
                                                    <label>Tipo de sesión:</label>
                                                    <table border="0" style="border:1px solid #ccc"  width="100%">
                                                        <td>
                                                        <input type="checkbox" <?php if($fila['sesi_tipo_presencial']==1){echo "checked";}?> id="txt_sesi_tipo_presencial" /> Presencial
                                                        </td>
                                                        <td>
                                                        <input type="checkbox" <?php if($fila['sesi_tipo_virtsincrono']==1){echo "checked";}?> id="txt_sesi_tipo_virtsincrono" /> Virtual sincrónica 
                                                        </td>
                                                        <td>
                                                        <input type="checkbox" <?php if($fila['sesi_tipo_virtasincrono']==1){echo "checked";}?> id="txt_sesi_tipo_virtasincrono" /> Virtual asincrónica
                                                        </td>                                                        
                                                    </table>
                                                </div>                                                
                                                <div class="uk-width-1-1">
                                                    <label>Competencia técnica o de especialidad:</label>
                                                    <table id="tb_competencia_especifica" border="0" style="border:1px solid #ccc" width="100%">
                                                          <?php
                                                              $a_fks_competencia_especifica=explode(",",$fila['fks_competencia_especifica']);
                                                                
                                                              $condicion="fk_modulo='$fk_modulo'";
                                                              $ds_ces=$general->listarRegistros("competencia_especifica","pk_competencia_especifica","asc",1,$condicion);
                                                              while($fila_ces=$ds_ces->fetch_array(MYSQLI_ASSOC)){
                                                                    foreach($a_fks_competencia_especifica as $pk_coes){
                                                                        $checked1=($pk_coes==$fila_ces['pk_competencia_especifica'])?"checked":"";
                                                                        if($checked1=="checked"){
                                                                            break;
                                                                        }
                                                                    }
                                                                ?>
                                                                  <tr>
                                                                      <td width="30" valign="top">
                                                                          <label><input type="checkbox" value="<?=$fila_ces['pk_competencia_especifica']?>" <?=$checked1;?>></label>
                                                                      </td>
                                                                      <td>
                                                                          <span class="uk-text-small"><?=$fila_ces['coes_descripcion']?></span>
                                                                      </td>
                                                                  </tr>
                                                                 <?php
                                                              }//end while?>
                                                    
                                                      </table>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <label>Competencia para la empleabilidad:</label>
                                                    <table id="tb_competencia_empleabilidad" border="0" style="border:1px solid #ccc" width="100%">
                                                          <?php
                                                              $a_fks_competencia_empleabilidad=explode(",",$fila['fks_competencia_empleabilidad']);
                                                              $ds_cem=$general->listarRegistros("competencia_empleabilidad","pk_competencia_empleabilidad","asc",1,$condicion);
                                                              while($fila_cem=$ds_cem->fetch_array(MYSQLI_ASSOC)){
                                                                    foreach($a_fks_competencia_empleabilidad as $pk_coem){
                                                                        $checked2=($pk_coem==$fila_cem['pk_competencia_empleabilidad'])?"checked":"";
                                                                        if($checked2=="checked"){
                                                                            break;
                                                                        }
                                                                    }
                                                                  ?>
                                                                  <tr>
                                                                      <td width="30" valign="top">
                                                                          <label><input type="checkbox" value="<?=$fila_cem['pk_competencia_empleabilidad']?>" <?=$checked2;?>></label>
                                                                      </td>
                                                                      <td>
                                                                          <span class="uk-text-small"><?=$fila_cem['coem_descripcion']?></span>
                                                                      </td>
                                                                  </tr>
                                                              <?php 
                                                              }//end while?>
                                                    
                                                      </table>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <label>Capacidad:</label>
                                                    <table id="tb_capacidad" border="0" style="border:1px solid #ccc" width="100%">
                                                          <?php
                                                            $a_fks_capacidad=explode(",",$fila['fks_capacidad']);
                                                            //-------para capacidad_logro
                                                            $fk_capacidad=$a_fks_capacidad[0];
                                                            $fks_capacidad_logro=$fila['fks_capacidad_logro'];
                                                            //--------------------------------
                                                              $condicion_cap="fk_ud='$fk_ud'";
                                                              $ds_cap=$general->listarRegistros("capacidad","pk_capacidad","asc",1,$condicion_cap);
                                                              
                                                              while($fila_cap=$ds_cap->fetch_array(MYSQLI_ASSOC)){
                                                                    foreach($a_fks_capacidad as $pk_capa){
                                                                        $checked3=($pk_capa==$fila_cap['pk_capacidad'])?"checked":"";
                                                                        if($checked3=="checked"){
                                                                            break;
                                                                        }
                                                                    }
                                                                  ?>
                                                                  <tr>
                                                                      <td width="30" valign="top">
                                                                          <label><input type="checkbox" onChange="listar_capacidad_logro('<?=$fks_capacidad_logro?>')" value="<?=$fila_cap['pk_capacidad']?>" <?=$checked3;?>></label>
                                                                      </td>
                                                                      <td>
                                                                          <span class="uk-text-small"><?=$fila_cap['capa_descripcion']?></span>
                                                                      </td>
                                                                  </tr>
                                                              <?php 
                                                              }//end while?>
                                                    
                                                      </table>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <label>Tema o Actividad:</label>
                                                    <textarea rows="2" class="uk-textarea uk-form-small" id="txt_sesi_tema"><?=$fila['sesi_tema']?></textarea>
                                                </div>                                                
                                                <div class="uk-width-1-1">
                                                  <label>Indicador(es) de logro de competencia a la que se vincula:</label>
                                                  <table id="tb_capacidad_logro" border="0" style="border:1px solid #ccc" width="100%">
                                                        <!--capacidad logros-->
                                                  </table>
                                                </div>
                                                
                                                <div class="uk-width-1-1">
                                                    <h4 class="uk-text-muted uk-background-muted">PLANIFICACIÓN DEL APRENDIZAJE</h4>
                                                </div>                                                
                                                <div class="uk-width-1-1">
                                                    <label>Indicador(es) de logro de competencia a la que se vincula:</label>
                                                    <textarea rows="2" class="uk-textarea uk-form-small" id="txt_plap_indicador_competencia"><?=$fila['plap_indicador_competencia']?></textarea>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <label>Indicador(es) de logro de capacidad vinculados a la sesión:</label>
                                                    <textarea rows="2" class="uk-textarea uk-form-small" id="txt_plap_indicador_capacidad"><?=$fila['plap_indicador_capacidad']?></textarea>
                                                </div>
                                                <div class="uk-width-1-1">
                                                    <label>Logro de la sesión:</label>
                                                    <textarea rows="2" class="uk-textarea uk-form-small" id="txt_plap_logro_sesion"><?=$fila['plap_logro_sesion']?></textarea>
                                                </div>
                                                

                                                <!--ACTIVIDADES-->
                                                    <!--inicio-->
                                                    <div class="uk-width-1-1">
                                                        <div uk-grid class="uk-grid-small">
                                                            <div class="uk-width-1-1">
                                                                <h4 class="uk-text-muted uk-background-muted">MOMENTO DE INICIO</h4>
                                                            </div>
                                                            <div class="uk-width-4-5">
                                                                <label>Estrategia:</label>
                                                                <input type="text" class="uk-input uk-form-small mayus" id="txt_inicio_estrategia" value="<?=$fila['inicio_estrategia']?>" />
                                                            </div>

                                                            <div class="uk-width-1-5 tc">
                                                                <br>
                                                                <label class="uk-margin-right">Agregar Actividades:</label>
                                                                <a href="#" onClick="form_nuevo_seac('<?=$pk?>','inicio');" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                            </div>

                                                            <div id="ct_list_seac_inicio" class="uk-width-1-1">
                                                                <!--sesion actividad-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--inicio-->
                                                    
                                                    <!--desarrollo-->
                                                    <div class="uk-width-1-1">
                                                        <div uk-grid class="uk-grid-small">
                                                            <div class="uk-width-1-1">
                                                                <h4 class="uk-text-muted uk-background-muted">MOMENTO DE DESARROLLO</h4>
                                                            </div>
                                                            <div class="uk-width-4-5">
                                                                <label>Estrategia:</label>
                                                                <input type="text" class="uk-input uk-form-small mayus" id="txt_desarrollo_estrategia" value="<?=$fila['desarrollo_estrategia']?>" />
                                                            </div>

                                                            <div class="uk-width-1-5 tc">
                                                                <br>
                                                                <label class="uk-margin-right">Agregar Actividades:</label>
                                                                <a href="#" onClick="form_nuevo_seac('<?=$pk?>','desarrollo');" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                            </div>

                                                            <div id="ct_list_seac_desarrollo" class="uk-width-1-1">
                                                                <!--sesion actividad-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--desarrollo-->

                                                    <!--cierre-->
                                                    <div class="uk-width-1-1">
                                                        <div uk-grid class="uk-grid-small">
                                                            <div class="uk-width-1-1">
                                                                <h4 class="uk-text-muted uk-background-muted">MOMENTO DE CIERRE</h4>
                                                            </div>
                                                            <div class="uk-width-4-5">
                                                                <label>Estrategia:</label>
                                                                <input type="text" class="uk-input uk-form-small mayus" id="txt_cierre_estrategia" value="<?=$fila['cierre_estrategia']?>" />
                                                            </div>

                                                            <div class="uk-width-1-5 tc">
                                                                <br>
                                                                <label class="uk-margin-right">Agregar Actividades:</label>
                                                                <a href="#" onClick="form_nuevo_seac('<?=$pk?>','cierre');" class="uk-icon-link" uk-icon="plus-circle"></a>
                                                            </div>

                                                            <div id="ct_list_seac_cierre" class="uk-width-1-1">
                                                                <!--sesion actividad-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--cierre-->
                                                    
                                                <!--ACTIVIDADES-->
                                                
                                                <!--EVALUACION-->
                                                    <div class="uk-width-1-1">
                                                        <h4 class="uk-text-muted uk-background-muted">ACTIVIDADES DE EVALUACIÓN</h4>
                                                    </div>
                                                            
                                                    <div class="uk-width-1-1">
                                                        <label>Indicadores de logro de la sesión:</label>
                                                        <textarea rows="2" class="uk-textarea uk-form-small" id="txt_eva_indicador_logro"><?=$fila['eva_indicador_logro']?></textarea>
                                                    </div>
                                                    <div class="uk-width-1-4">
                                                        <label>Técnicas:</label>
                                                        <input type="text" class="uk-input uk-form-small mayus" id="txt_eva_tecnicas" value="<?=$fila['eva_tecnicas']?>" />
                                                    </div>
                                                    <div class="uk-width-1-4">
                                                        <label>Instrumentos:</label>
                                                        <input type="text" class="uk-input uk-form-small mayus" id="txt_eva_instrumentos" value="<?=$fila['eva_instrumentos']?>" />
                                                    </div>
                                                    <div class="uk-width-1-4">
                                                        <label>Peso o Porcentaje:</label>
                                                        <input type="text" class="uk-input uk-form-small mayus" id="txt_eva_peso" value="<?=$fila['eva_peso']?>" />
                                                    </div>
                                                    <div class="uk-width-1-4">
                                                        <label>Momento:</label>
                                                        <input type="text" class="uk-input uk-form-small mayus" id="txt_eva_momento" value="<?=$fila['eva_momento']?>" />
                                                    </div>                                               
                                                <!--EVALUACION-->
                                                
                                                <!--BIBLIO-->
                                                    <div class="uk-width-1-1">
                                                        <h4 class="uk-text-muted uk-background-muted">BIBLIOGRAFÍA</h4>
                                                    </div>                                                
                                                    <div class="uk-width-1-1">
                                                        <label>Bibliografia para el docente:</label>
                                                        <textarea rows="4" class="uk-textarea uk-form-small" id="txt_biblio_docente"><?=$fila['biblio_docente']?></textarea>
                                                    </div>
                                                    <div class="uk-width-1-1">
                                                        <label>Bibliografia para el estudiante:</label>
                                                        <textarea rows="4" class="uk-textarea uk-form-small" id="txt_biblio_estudiante"><?=$fila['biblio_estudiante']?></textarea>
                                                    </div> 
                                                <!--BIBLIO-->
                                                
                                                <!--CAMPOS-->
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
                        <button type="button" value="Submit" onClick="validaForm_<?=$prefijo_op;?>(1);" class="uk-button uk-button-primary uk-button-small"><i uk-icon="check"></i> &nbsp; Guardar</button>
                        <span uk-alert class="uk-alert-danger uk-margin-remove uk-padding-remove fs10" style="display:none" id="frm_msg_error"></span>  
                  </div> 
                  <!--footer--> 
              
            </div>
      </div>
  
</div>

<script>
listar_capacidad_logro('<?=$fks_capacidad_logro?>');
listar_seac("inicio");
listar_seac("desarrollo");
listar_seac("cierre");
</script>
<?php
break; //FIN DE NEW
?>

<?php
case "listar_capacidad_logro":
?>
          <?php
          
            if(isset($_POST['fks_capacidad_logro'])){
                $a_fks_capacidad_logro=explode(",",$_POST['fks_capacidad_logro']);
            }

            $a_fks_capacidad=null;
            if(isset($_POST['fks_capacidad'])){
                $a_fks_capacidad=$_POST['fks_capacidad'];
                $checked4="";
                foreach($a_fks_capacidad as $pk_capacidad){
                    $ds_caplogro=$general->listarRegistros("capacidad_logro","pk_capacidad_logro","asc",1,"fk_capacidad='$pk_capacidad'");
                    while($fila_caplogro=$ds_caplogro->fetch_array(MYSQLI_ASSOC)){
                                foreach($a_fks_capacidad_logro as $pk_capalogro){
                                    $checked4=($pk_capalogro==$fila_caplogro['pk_capacidad_logro'])?"checked":"";
                                    if($checked4=="checked"){
                                        break;
                                    }
                                }
                          ?>
                          <tr>
                              <td width="30" valign="top">
                                  <label><input type="checkbox" onChange="pasar_capacidad_logro();" value="<?=$fila_caplogro['pk_capacidad_logro']?>" <?=$checked4;?>></label>
                              </td>
                              <td>
                                  <span class="uk-text-small"><?=$fila_caplogro['calo_descripcion']?></span>
                              </td>
                          </tr>
                      <?php 
                      }//end while*/
                } //end for
            }//end if         

    ?>
<?php
break; //FIN DE NEW
?>

<?php
case "pasar_capacidad_logro":
?>
<?php
     $capacidad_logro="";
     if(isset($_POST['fks_capacidad_logro'])){
          $fks_capacidad_logro=$_POST['fks_capacidad_logro'];
          foreach($fks_capacidad_logro as $pk_capacidad_logro){
              $capacidad_logro.=$general->valorCampo("capacidad_logro","calo_descripcion","pk_capacidad_logro='$pk_capacidad_logro'")."\n";
          }
     }
     echo trim($capacidad_logro);
    ?>
<?php
break; //FIN DE NEW
?>

<?php
/*UPDATE*/
case "update_general":
?>
<?php
$pk=$_POST['pk'];

$sesi_horas=$_POST['sesi_horas'];
$sesi_hora_sincrona=$_POST['sesi_hora_sincrona'];
$sesi_hora_asincrona=$_POST['sesi_hora_asincrona'];

$fks_competencia_especifica=null;
$sesi_comp_especifica="";
if(isset($_POST['fks_competencia_especifica'])){
	$fks_competencia_especifica=$_POST['fks_competencia_especifica'];
    $str_pk_competencia_especifica=null;
    foreach($fks_competencia_especifica as $pk_competencia_especifica){
        $str_pk_competencia_especifica.=$pk_competencia_especifica.",";
        $sesi_comp_especifica.=$general->valorCampo("competencia_especifica","coes_descripcion","pk_competencia_especifica='$pk_competencia_especifica'")."\n";
    }
    $fks_competencia_especifica = substr($str_pk_competencia_especifica, 0, -1);
}

$fks_competencia_empleabilidad=null;
$sesi_comp_empleabilidad="";
if(isset($_POST['fks_competencia_empleabilidad'])){
	$fks_competencia_empleabilidad=$_POST['fks_competencia_empleabilidad'];
    $str_pk_competencia_empleabilidad=null;
    foreach($fks_competencia_empleabilidad as $pk_competencia_empleabilidad){
        $str_pk_competencia_empleabilidad.=$pk_competencia_empleabilidad.",";
        $sesi_comp_empleabilidad.=$general->valorCampo("competencia_empleabilidad","coem_descripcion","pk_competencia_empleabilidad='$pk_competencia_empleabilidad'")."\n";
    }
    $fks_competencia_empleabilidad = substr($str_pk_competencia_empleabilidad, 0, -1);
}

$fks_capacidad=null;
$sesi_capacidad="";
if(isset($_POST['fks_capacidad'])){
	$fks_capacidad=$_POST['fks_capacidad'];
    $str_pk_capacidad=null;
    foreach($fks_capacidad as $pk_capacidad){
        $str_pk_capacidad.=$pk_capacidad.",";
        $sesi_capacidad.=$general->valorCampo("capacidad","capa_descripcion","pk_capacidad='$pk_capacidad'")."\n";
    }
    $fks_capacidad = substr($str_pk_capacidad, 0, -1);
}


$sesi_capacidad_logro="";
$fks_capacidad_logro=null;
if(isset($_POST['fks_capacidad_logro'])){
	$fks_capacidad_logro=$_POST['fks_capacidad_logro'];
    $str_pk_capacidad_logro=null;
    foreach($fks_capacidad_logro as $pk_capacidad_logro){
        $str_pk_capacidad_logro.=$pk_capacidad_logro.",";
        $sesi_capacidad_logro.=$general->valorCampo("capacidad_logro","calo_descripcion","pk_capacidad_logro='$pk_capacidad_logro'")."\n";
    }
    $fks_capacidad_logro = substr($str_pk_capacidad_logro, 0, -1);
}

$sesi_tema=addslashes($_POST['sesi_tema']);
$sesi_act_practico=($_POST['sesi_act_practico']=="false") ? "0" : "1";
$sesi_act_teopractico=($_POST['sesi_act_teopractico']=="false") ? "0" : "1";
$sesi_tipo_presencial=($_POST['sesi_tipo_presencial']=="false") ? "0" : "1";
$sesi_tipo_virtsincrono=($_POST['sesi_tipo_virtsincrono']=="false") ? "0" : "1";
$sesi_tipo_virtasincrono=($_POST['sesi_tipo_virtasincrono']=="false") ? "0" : "1";
$sesi_fecha=$_POST['sesi_fecha'];
$sesi_anio=date("Y", strtotime($sesi_fecha));
$plap_indicador_competencia=addslashes($_POST['plap_indicador_competencia']);
$plap_indicador_capacidad=addslashes($_POST['plap_indicador_capacidad']);
$plap_logro_sesion=addslashes($_POST['plap_logro_sesion']);

$campos="sesi_anio='$sesi_anio',
        sesi_horas='$sesi_horas',
        sesi_hora_sincrona='$sesi_hora_sincrona',
        sesi_hora_asincrona='$sesi_hora_asincrona',
        fks_competencia_especifica='$fks_competencia_especifica',
        sesi_comp_especifica='$sesi_comp_especifica',
        fks_competencia_empleabilidad='$fks_competencia_empleabilidad',
        sesi_comp_empleabilidad='$sesi_comp_empleabilidad',
        fks_capacidad='$fks_capacidad',
        sesi_capacidad='$sesi_capacidad',
        fks_capacidad_logro='$fks_capacidad_logro',
        sesi_capacidad_logro='$sesi_capacidad_logro',
        sesi_tema='$sesi_tema',
        sesi_act_practico='$sesi_act_practico',
        sesi_act_teopractico='$sesi_act_teopractico',
        sesi_tipo_presencial='$sesi_tipo_presencial',
        sesi_tipo_virtsincrono='$sesi_tipo_virtsincrono',
        sesi_tipo_virtasincrono='$sesi_tipo_virtasincrono',
        sesi_fecha='$sesi_fecha',
        plap_indicador_competencia='$plap_indicador_competencia',
        plap_indicador_capacidad='$plap_indicador_capacidad',
        plap_logro_sesion='$plap_logro_sesion'";

$general->modificarCampos("sesion",$campos,1,"pk_sesion='$pk'");
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