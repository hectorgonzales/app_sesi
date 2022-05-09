<?php session_start();
if (isset($_SESSION['usua_login'])){ 

}else{
	header ("Location:login.php");
}
require_once("../resources/tcpdf/tcpdf.php");
include_once("../model/General.php");
date_default_timezone_set('America/Lima');

//=========================================================
class MYPDF extends TCPDF {

//Page header
	public function Header() {
	$image_file = K_PATH_IMAGES."logo_iso.gif";
	$this->Image($image_file,63, 5, 18, "", "GIF", "", "T", false, 300, "", false, false, 0, false, false, false);
	$this->Image($image_file,212, 5, 18, "", "GIF", "", "T", false, 300, "", false, false, 0, false, false, false);
	$style = array("width" => 0.1, "cap" => "butt", "join" => "miter", "dash" => 0, "color" => array(00,00,00));
	$style2 = array("width" => 0.1, "cap" => "butt", "join" => "miter", "dash" => 2, "color" => array(00,00,00));
	$this->Line(($this->getPageWidth())/2-15, 30, PDF_MARGIN_LEFT, 30, $style);
	$this->Line(158, 30, 278, 30, $style);
	$this->Line(146, 0, 146, $this->getPageHeight(), $style2);
	}
}
//=========================================================
$pdf = new MYPDF('L', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('SITD');
	$pdf->SetTitle("Hoja de Observación");
 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 9);
	// set border width
	$pdf->SetLineWidth(0.3);
	// set margins
	//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetMargins(10, 18, 10);
	$pdf->SetHeaderMargin(10);
	//$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$pdf->setListIndentWidth(4); //padd ul
  
	$pdf->addPage();
	$codigoHTML = '';
	
//========================================================	
?>
<?php
$codigoHTML='
<html>
<head>
<title></title>
<style>
body{font-family:Arial, Helvetica, sans-serif;font-size:8pt;}
.pj{ text-align:justify;}
h1{text-align:center}
.ley{ font-size:7pt;text-align:justify;font-style:italic}
.sp1{text-align:center;margin:0; padding:0;}
.table{border-collapse: collapse; border: 1px solid #000;}
.table th, .table td{border: 1px solid #000; padding:2px}
.firma{ border-top:0.5px dotted #000}
</style>
';

$codigoHTML.='</head>
<body>';
//========================
	$general=new General();
	$pk=$_GET['pk'];
	$condicion="pk_expediente='$pk'";
	$ds=$general->listarRegistros("expediente","pk_expediente","asc",1,$condicion);	
	$fila=$ds->fetch_assoc();
	$expediente_nro=$fila['expe_recepcion_nro'];
	
     
//=========================
$hoja_observacion='
		<p class="sp1">
			<span><b>MUNICIPALIDAD PROVINCIAL DE NASCA</b></span><br>
			<span>SECRETARIA GENERAL</span><br>
			<span>Mesa de Partes</span>
		</p>
		<br />
		<h1><u>HOJA DE OBSERVACION</u></h1>
		<br />
		<p class="pj">Exp. Adm. N&deg; <b>'.$expediente_nro.'</b> presentado el d&iacute;a <b>'.date("d/m/Y",strtotime($fila['expe_recepcion_fecha'])).'</b>,hora <b>'.$fila['expe_recepcion_hora'].'</b> promovido por <b>'.$fila['expe_origen_de'].'</b>.</p>
		<p class="pj">Por el presente, se deja constancia que el <b>promoviente</b>, no ha anexado los siguientes documentos, que constituyen parte de los requisitos se&ntilde;alados en el TUPA, aprobado por Decreto de Alcald&iacute;a N&deg; 00-0000-XXXX, el Articulo 113&deg; de la Ley N&deg; 27444.</p>
		';
		
		// REQUISITOS---------------------------------
		if($fila['expe_tupa_es']==1){

			$hoja_observacion.='
			<table border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr><td colspan="2"><b>REQUISITOS POR REGULARIZAR:</b></td></tr>';
			 
		 	$expe_tupa_procedimiento_fk=$fila['expe_tupa_procedimiento_fk'];
			
			$condicion_procedimiento="prre_procedimiento_fk='$expe_tupa_procedimiento_fk'";
			$ds_procedimiento=$general->listarRegistros("procedimiento_requisito","pk_procedimiento_requisito","asc",1,$condicion_procedimiento);	
			
			 $pks_req=$fila['expe_tupa_requisitos'];
			 $a_pks_req=preg_split('[,]', $pks_req);
			 $t_a_pks=count($a_pks_req);
			 while($fila_procedimiento=$ds_procedimiento->fetch_array(MYSQLI_ASSOC)){
				 $existe="no";
				 for($r=0;$r<$t_a_pks;$r++){
					 if($a_pks_req[$r]==$fila_procedimiento['pk_procedimiento_requisito']){
						$existe="si";
						break;
					 }
				 }
				if($existe=="no"){
					$hoja_observacion.='
						<tr>
							<td width="20" align="right">&raquo; &nbsp;</td>
							<td width="300">'.$fila_procedimiento['prre_nombre'].'</td>									
						</tr>			
					';
				}
			 }
			 $hoja_observacion.='</table>&nbsp;<br/>';			 
		}//end if
		//FIN REQUISITOS---------------------------------
		
		//OBSERVACIONES---------------------------------
			$expe_registro_uo_fk=$_SESSION['fk_uo'];
			$condicion="exob_uo_fk='$expe_registro_uo_fk' AND exob_expediente_fk='$pk'";
			$ds=$general->listarRegistros("expediente_observa","pk_expediente_observa","asc",1,$condicion);
				    	
			$tr=$ds->num_rows;
			if ($tr==0){
			}else{
				$hoja_observacion.='
				<table border="0" width="100%" cellspacing="0" cellpadding="0">
				   <tr>
					  <th colspan="2"><b>OBSERVACIONES:</b></th>
				   </tr>';
		   							
				$n=1;
				while($fila=$ds->fetch_array(MYSQLI_ASSOC)){;
					$hoja_observacion.='<tr>
					<td align="center" width="4%">'.$n++.'.-</td>
					<td  width="96%">'.$fila['exob_observacion'].'</td>    
					</tr>';
				}
				$hoja_observacion.='</table>
				&nbsp;';
			}
		//FIN OBSERVACIONES---------------------------------
       	
	$hoja_observacion.='		
		<p class="ley">
		<b>Ley N&deg; 27444, Ley del Procedimiento Administrativo General,</b><br />

		<cite class="pj"><b>Articulo 125 "125.1</b> Deben ser recibidos todos los formularios o escritos presentados, no obstante incumplir los requisitos establecidos en la presente Ley, que no est&eacute;n acompa&ntilde;ados de los recaudos correspondientes o se encuentran afectados por otro defecto u omisi&oacute;n formal prevista en el TUPA, que amerite correcci&oacute;n. En un solo acto y por &uacute;nica vez, la unidad de recepci&oacute;n al momento de su presentaci&oacute;n realiza las observaciones por incumplimiento de requisitos que no puedan ser salvados de oficio, invitando al administrado a subsanarlas dentro de un plazo m&aacute;ximo de dos d&iacute;as h&aacute;biles".
		<b>"125.2</b> La observaci&oacute;n debe anotarse bajo firma del receptor en la solicitud y en la copia que conservar&aacute; el administrado, con las alegaciones respectivas si las hubiera, indicando que, si asi no lo hiciera, se tendr&aacute; por no presentada su petici&oacute;n".
		</cite>

		</p>
		
		<p class="pj">
		Para la subsanaci&oacute;n respectiva, se le otorga un plazo de 48 horas en caso de incumplimiento, se considerar&aacute; por no presentada la solicitud, conforme se indica en la Directiva N&deg; 000-0000-GG-XXX aprobada  por Resoluci&oacute;n de Gerencia General N&deg; 000-0000-GG-XXX.
		</p>
		&nbsp;<br /><br /><br />
		<table border="0" class="tasble" width="100%" align="center" cellspacing="0" cellpadding="0">
			<tr>
			<td class="firma" align="center" valign="top" width="32%">MESA DE PARTES</td>
			<td></td>
			<td class="firma" align="center"  width="32%">ADMINISTRADO<BR><p align="left">DNI:<br />Domicilio:</p></td>
			</tr>
		</table>
		';	
		 
$codigoHTML.='
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="45%">
	'.$hoja_observacion.'
	</td>
	<td width="8%">&nbsp;</td>
	<td width="45%">
	'.$hoja_observacion.'
	</td>
  </tr>
</table>';

//=======================
$codigoHTML.='		
</body>
</html>
';
	?>
<?php
//====================================================
	$pdf->writeHTML($codigoHTML, true, 0, true, 0);
	$pdf->lastPage();
	$pdf->output('hoja_observacion.pdf', 'I');
//====================================================	
?>