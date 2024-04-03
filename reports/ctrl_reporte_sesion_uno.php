<?php session_start();
if (isset($_SESSION['pk_usuario'])){ 

}else{
	header ("Location:index.php");
}
require_once("../resources/tcpdf/tcpdf.php");
include_once("../model/General.php");
$general=new General();
date_default_timezone_set('America/Lima');
//--------------------------------------------------------------------	
class MYPDF extends TCPDF {
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont('Helvetica', '', 8);
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
//=========================================================
$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('HGP');
	$pdf->SetTitle("Ficha de Sesión");	
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->SetLineWidth(0.1);
	$pdf->SetMargins(13, 13, 13);
	$pdf->SetHeaderMargin(10);
	$pdf->setListIndentWidth(4);
    $pdf->setPrintHeader(false);
	$pdf->addPage();
	$codigoHTML = '';

$style = array(
			'position' => '',
			'align' => 'R',
			'stretch' => true,
			'fitwidth' => true,
			'cellfitalign' => '',
			'border' => false,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255),
			'text' => false,
			'font' => 'helvetica',
			'fontsize' => 8,
			'stretchtext' => 1
		);
        
//========================================================
//--------------------------------------------------------------------
$pk_sesion=$_GET['pk_sesion'];
$v=$_GET['v'];

	$ds=$general->modificarRegistro("sesion","pk_sesion",$pk_sesion);	
	$fila=$ds->fetch_assoc();
	
    $fk_usuario=$fila['fk_usuario'];
    $fk_ud_usuario=$fila['fk_ud_usuario'];
    $fk_ud=$fila['fk_ud'];
    $sesi_orden=$fila['sesi_orden'];
    $sesi_docente=$fila['sesi_docente'];
    $sesi_anio=$fila['sesi_anio'];
    $sesi_periodo=$fila['sesi_periodo'];
    $sesi_horas=$fila['sesi_horas'];
    $sesi_hora_sincrona=$fila['sesi_hora_sincrona'];
    $sesi_hora_asincrona=$fila['sesi_hora_asincrona'];
    $sesi_carrera=$fila['sesi_carrera'];
    $fks_competencia_especifica=$fila['fks_competencia_especifica'];
    $sesi_comp_especifica=$fila['sesi_comp_especifica'];
    $fks_competencia_empleabilidad=$fila['fks_competencia_empleabilidad'];
    $sesi_comp_empleabilidad=$fila['sesi_comp_empleabilidad'];
    $fk_modulo=$fila['fk_modulo'];
    $sesi_modulo=$fila['sesi_modulo'];
    $sesi_ud=$fila['sesi_ud'];
    $fks_capacidad=$fila['fks_capacidad'];
    $sesi_capacidad=$fila['sesi_capacidad'];
    $fks_capacidad_logro=$fila['fks_capacidad_logro'];
    $sesi_capacidad_logro=$fila['sesi_capacidad_logro'];
    $sesi_tema=$fila['sesi_tema'];
    $sesi_act_practico=($fila['sesi_act_practico']==1)?"X":"&nbsp;&nbsp;";
    $sesi_act_teopractico=($fila['sesi_act_teopractico']==1)?"X":"&nbsp;&nbsp;";
    $sesi_tipo_presencial=($fila['sesi_tipo_presencial']==1)?"X":"&nbsp;&nbsp;";
    $sesi_tipo_virtsincrono=($fila['sesi_tipo_virtsincrono']==1)?"X":"&nbsp;&nbsp;";
    $sesi_tipo_virtasincrono=($fila['sesi_tipo_virtasincrono']==1)?"X":"&nbsp;&nbsp;";
    $sesi_fecha=$fila['sesi_fecha'];
    $plap_indicador_competencia=$fila['plap_indicador_competencia'];
    $plap_indicador_capacidad=$fila['plap_indicador_capacidad'];
    $plap_logro_sesion=$fila['plap_logro_sesion'];
    $inicio_estrategia=$fila['inicio_estrategia'];
    $desarrollo_estrategia=$fila['desarrollo_estrategia'];
    $cierre_estrategia=$fila['cierre_estrategia'];
    $eva_indicador_logro=$fila['eva_indicador_logro'];
    $fk_eva_tecnica=$fila['fk_eva_tecnica'];
    $eva_tecnicas=$fila['eva_tecnicas'];
    $fk_eva_tecnica_instrumento=$fila['fk_eva_tecnica_instrumento'];
    $eva_instrumentos=$fila['eva_instrumentos'];
    $eva_peso=$fila['eva_peso'];
    $eva_momento=$fila['eva_momento'];
    
    $biblio_docente = trim(nl2br($fila['biblio_docente']));
		$biblio_docente_ul="";
		if(!empty($biblio_docente)){
		  $biblio_docente = explode("<br />",$biblio_docente);
		  $tbiblio_docente=count($biblio_docente);
			  for($t=0;$t<$tbiblio_docente;$t++){
				 $biblio_docente_ul.="<li>$biblio_docente[$t]</li>";
			  }
		  }

    $biblio_estudiante = trim(nl2br($fila['biblio_estudiante']));
		$biblio_estudiante_ul="";
		if(!empty($biblio_estudiante)){
		  $biblio_estudiante = explode("<br />",$biblio_estudiante);
		  $tbiblio_estudiante=count($biblio_estudiante);
			  for($tt=0;$tt<$tbiblio_estudiante;$tt++){
				 $biblio_estudiante_ul.="<li>$biblio_estudiante[$tt]</li>";
			  }
		  }
    
//--------------------------------------------------------------------    
?>
<?php
$codigoHTML='
<html>
<head>
<title></title>';
//8X3
$codigoHTML.='<style>'.file_get_contents('../resources/css/reportes.css').'</style>';

$codigoHTML.='</head>
<body>';
//========================

$codigoHTML.='
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="30%"><img src="..//resources/images/minedu.jpg" width="291" /></td>
    <td width="10%" class="tc"><img src="..//resources/images/logo_ist.png" height="42" /></td>
    <td width="40%"><br><br><b><span class="t2">Instituto de Educación Superior Tecnológico Público Nasca</span></b></td>
    <td width="20%">';
        $BARRA = $pdf->serializeTCPDFtagParameters(array("IESTPN", 'C39', '', '', '', 15, 0.4, $style, 'N'));
		$codigoHTML .= '<tcpdf method="write1DBarcode" params="'.$BARRA.'" />';

$codigoHTML.='</td>
</tr>

</table>
';


$codigoHTML.='
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="tabla">
<tr>
    <td colspan="7" class="bg1"><span class="t1"><b>SESION SINCRONICA<br>ACTIVIDAD DE APRENDIZAJE N° 01</b></span></td>
</tr>
<tr>
    <th colspan="7">I.INFORMACIÓN GENERAL</th>
</tr>
<tr>
    <td width="30%"><span class="b">Docente a cargo:</span></td>
    <td colspan="6" width="70%">'.$sesi_docente.'</td>
</tr>
<tr>
    <td rowspan="3"><span class="b">Año:</span></td>
    <td colspan="2" rowspan="3" width="10%" class="tc">'.$sesi_anio.'</td>
    <td colspan="2" rowspan="3" width="10%"class="tc"><span class="b">Periodo </span>'.$sesi_periodo.'</td>
    <td colspan="2" width="50%" class="tc"><span class="b">HORAS</span></td>
</tr>
<tr>
    <td width="25%" class="tc">Sincrónicas:</td>
    <td width="25%" class="tc">Asincrónicas</td>
</tr>
<tr>
    <td class="tc">('.$sesi_hora_sincrona.' min.)</td>
    <td class="tc">('.$sesi_hora_asincrona.' min.)</td>
</tr>
<tr>
    <td><span class="b">1.1 Programa de estudios:</span></td>
    <td colspan="6">'.$sesi_carrera.'</td>
</tr>
<tr>
    <td><span class="b">1.2 Competencia técnica o de especialidad:</span></td>
    <td colspan="6">'.$sesi_comp_especifica.'</td>
</tr>
<tr>
    <td><span class="b">1.3 Competencia para la empleabilidad:</span></td>
    <td colspan="6">'.$sesi_comp_empleabilidad.'</td>
</tr>
<tr>
    <td><span class="b">1.4 Módulo:</span></td>
    <td colspan="6">'.$sesi_modulo.'</td>
</tr>
<tr>
    <td><span class="b">1.5 Unidad didáctica:</span></td>
    <td colspan="6">'.$sesi_ud.'</td>
</tr>
<tr>
    <td><span class="b">1.6 Capacidad:</span></td>
    <td colspan="6">'.$sesi_capacidad.'</td>
</tr>
<tr>
    <td><span class="b">1.7 Indicador(es) de logro de competencia a la que se vincula:</span></td>
    <td colspan="6">'.$sesi_capacidad_logro.'</td>
</tr>
<tr>
    <td><span class="b">1.8 Tema o Actividad:</span></td>
    <td colspan="6">'.$sesi_tema.'</td>
</tr>
<tr>
    <td><span class="b">1.9 Actividades de tipo:</span></td>
    <td colspan="3" width="35%" class="tc">Teórico - Práctico ('.$sesi_act_teopractico.')</td>
    <td colspan="3" width="35%" class="tc">Práctico ('.$sesi_act_practico.')</td>
</tr>
<tr>
    <td><span class="b">1.10 Tipo de sesión:</span></td>
    <td width="23%" class="tc">Presencial ('.$sesi_tipo_presencial.')</td>
    <td colspan="3" width="23%" class="tc">Virtual sincrónica ('.$sesi_tipo_virtsincrono.')</td>
    <td colspan="2" width="24%" class="tc">Virtual asincrónica ('.$sesi_tipo_virtasincrono.')</td>
</tr>
<tr>
    <td><span class="b">1.11 Fecha de desarrollo:</span></td>
    <td colspan="6">'.date("d/m/Y",strtotime($sesi_fecha)).'</td>
</tr>
<tr>
    <th colspan="7">II. PLANIFICACIÓN DEL APRENDIZAJE</th>
</tr>
<tr>
    <td><span class="b">2.1 Indicador(es) de logro de competencia a la que se vincula</span></td>
    <td colspan="6">'.$plap_indicador_competencia.'</td>
</tr>
<tr>
<td><span class="b">2.2 Indicador(es) de logro de capacidad vinculados a la sesión</span></td>
<td colspan="6">'.$plap_indicador_capacidad.'</td>
</tr>
<tr>
    <td><span class="b">2.3 Logro de la sesión</span></td>
    <td colspan="6">'.$plap_logro_sesion.'</td>
</tr>
</table>
';


$condicion="fk_sesion='$pk_sesion' AND seac_momento='inicio'";
$ds=$general->listarRegistros("sesion_actividad","pk_sesion_actividad","asc",1,$condicion);
$tr=$ds->num_rows+1;

$codigoHTML.='
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="tabla">
<tr>
    <th colspan="4">III SECUENCIA DIDÁCTICA</th>
</tr>
<tr>
    <td width="13%" class="bg1 t3">MOMENTOS</td>
    <td width="54%" class="bg1 t3">ESTRATEGIAS Y ACTIVIDADES</td>
    <td width="24%" class="bg1 t3">RECURSOS DIDÁCTICOS</td>
    <td width="9%" class="bg1 t3">TIEMPO</td>
</tr>
<tr>
    <td rowspan="'.$tr.'"><span class="b">Inicio</span></td>
    <td colspan="3" class="bg2"><span class="bb">Estrategias:</span> <span class="b">'.$inicio_estrategia.'</span></td>

</tr>';

//=================================================	
	while($fila=$ds->fetch_array(MYSQLI_ASSOC)){  
		$actividad=$fila['seac_actividad'];
		$icono=$fila['seac_recurso_icono'];
        $tiempo=$fila['seac_tiempo'];
		//=========================		
	$codigoHTML.='	
    <tr>
        <td>'.$actividad.'</td>
        <td class="tc"><img src="..//resources/images/'.$icono.'" height="20" /></td>
        <td class="tc">'.$tiempo.' min.</td>
    </tr>';
		//=======================
	}//end while
    

$condicion_desarrollo="fk_sesion='$pk_sesion' AND seac_momento='desarrollo'";
$ds2=$general->listarRegistros("sesion_actividad","pk_sesion_actividad","asc",1,$condicion_desarrollo);
$tr2=$ds2->num_rows+1;

$codigoHTML.='
<tr>
    <td rowspan="'.$tr2.'"><span class="b">Desarrollo</span></td>
    <td colspan="3" class="bg2"><span class="bb">Estrategias:</span> <span class="b">'.$desarrollo_estrategia.'</span></td>

</tr>';

//=================================================	
	while($fila2=$ds2->fetch_array(MYSQLI_ASSOC)){  
		$actividad2=$fila2['seac_actividad'];
		$icono2=$fila2['seac_recurso_icono'];
        $tiempo2=$fila2['seac_tiempo'];
		//=========================		
	$codigoHTML.='	
    <tr>
        <td>'.$actividad2.'</td>
        <td class="tc"><img src="..//resources/images/'.$icono2.'" height="20" /></td>
        <td class="tc">'.$tiempo2.' min.</td>
    </tr>';
		//=======================
	}//end while


$condicion_cierre="fk_sesion='$pk_sesion' AND seac_momento='cierre'";
$ds3=$general->listarRegistros("sesion_actividad","pk_sesion_actividad","asc",1,$condicion_cierre);
$tr3=$ds3->num_rows+1;
$codigoHTML.='
<tr>
    <td rowspan="'.$tr3.'"><span class="b">Cierre</span></td>
    <td colspan="3" class="bg2"><span class="bb">Estrategias:</span> <span class="b">'.$cierre_estrategia.'</span></td>

</tr>';

//=================================================	
	while($fila3=$ds3->fetch_array(MYSQLI_ASSOC)){  
		$actividad3=$fila3['seac_actividad'];
		$icono3=$fila3['seac_recurso_icono'];
        $tiempo3=$fila3['seac_tiempo'];
		//=========================		
	$codigoHTML.='	
    <tr>
        <td>'.$actividad3.'</td>
        <td class="tc"><img src="..//resources/images/'.$icono3.'" height="20" /></td>
        <td class="tc">'.$tiempo3.' min.</td>
    </tr>';
		//=======================
	}//end while

$codigoHTML.='
</table>
';


$codigoHTML.='
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="tabla">
<tr>
    <th colspan="5" valign="top">IV. ACTIVIDADES DE EVALUACIÓN</th>
</tr>
<tr>
    <td width="40%" class="bg1 t3">Indicadores de logro de la sesión</td>
    <td width="19%" class="bg1 t3">Técnicas</td>
    <td width="15%" class="bg1 t3">Instrumentos</td>
    <td width="13%" class="bg1 t3">Peso o Porcentaje</td>
    <td width="13%" class="bg1 t3">Momento</td>
</tr>
<tr>
    <td>'.$eva_indicador_logro.'</td>
    <td>'.$eva_tecnicas.'</td>
    <td>'.$eva_instrumentos.'</td>
    <td class="tc">'.$eva_peso.'</td>
    <td class="tc">'.$eva_momento.'</td>
</tr>
</table>
';

$codigoHTML.='
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="tabla">
<tr>
    <th colspan="2">V. BIBLIOGRAFÍA</th>
</tr>
<tr>
    <td width="50%" class="bg1 t3">Para el docente</td>
    <td width="50%" class="bg1 t3">Para el estudiante</td>
</tr>
<tr>
    <td valign="top"><ul>'.$biblio_docente_ul.'</ul></td>
    <td valign="top"><ul>'.$biblio_estudiante_ul.'</ul></td>
</tr>
</table>
';

$codigoHTML.='
&nbsp; <br><br><br><br>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="70%"></td>
<td width="30%" class="tc">___________________________</td>
</tr>
<tr>
<td></td>
<td class="tc">'.$sesi_docente.'</td>
</tr>
</table>
';



$codigoHTML.='
</body>
</html>
';
	?>
<?php
//====================================================
	$pdf->writeHTML($codigoHTML, true, 0, true, 0);
	$pdf->lastPage();
	$pdf->output('ficha_sesion_'.str_pad($sesi_orden, 2, "0", STR_PAD_LEFT).'.pdf', 'I');
//====================================================	
?>