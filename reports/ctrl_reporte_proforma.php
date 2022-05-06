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
$fk_salida=$_GET['fk_salida'];
	$condicion2="pk_salida='$fk_salida'";
	$ds2=$general->listarRegistros("salida","pk_salida","asc",1,$condicion2);	
	$fila2=$ds2->fetch_assoc();
	$ruc=$fila2['sali_cliente_ruc_dni'];
	$cliente=$fila2['sali_cliente_nombre'];
	$direccion=$fila2['sali_cliente_direccion'];
	$numero=$fila2['sali_documento_numero'];
	$fecha=$fila2['sali_fecha'];
//--------------------------------------------------------------------	
	
class MYPDF extends TCPDF {
	protected $producto;
	protected $codigo;
    public function setCliente($var){
        $this->cliente = $var;
    }
	public function setRuc($var){
        $this->ruc = $var;
    }
    public function setDireccion($var){
        $this->direccion = $var;
    }
    public function setNumero($var){
        $this->numero = $var;
    }
    public function setFecha($var){
        $this->fecha = $var;
    }			

	public function Header() {
		$image_file = K_PATH_IMAGES."logo_color.jpg";
		$this->Image($image_file,12, 3, 32, "", "JPG", "", "T", false, 300, "", false, false, 0, false, false, false);
		 $this->SetFont('helvetica', 'B', 18);
		$this->MultiCell(0, 10,"ODYNET", 0, 'C', 0, 0, '', '14', true,0,true);
		$this->SetFont('helvetica', 'B', 11);
		$this->MultiCell(0, 10,"RUC: <b>XXXXXXXXXX</b><br />CALLE LIMA XXX- NASCA", 0, 'C', 0, 0, '', '22', true,0,true);
		$this->SetFont('helvetica', 'N', 9);
		$style = array("width" => 0.1, "cap" => "butt", "join" => "miter", "dash" => 0, "color" => array(00,00,00));
		$this->Line(10, 34, 200, 34, $style);
		$this->Line(10, 48, 200, 48, $style);
		$this->MultiCell(0, 10,"CLIENTE: <b>".$this->cliente."</b><br />DIRECCION: <b>".$this->direccion."</b><br />RUC/DNI: <b>".$this->ruc."</b>", 0, 'L', 0, 0, '10', '35', true,0,true);
		$this->MultiCell(0, 10,"COD. SALIDA: <b>".$this->numero."</b>", 0, 'R', 0, 0, '0', '35', true,0,true);
		$this->MultiCell(0, 10,"FECHA: <b>".date("d/m/Y",strtotime($this->fecha))."</b>", 0, 'R', 0, 0, '0', '39', true,0,true);
	}
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
	$pdf->SetTitle("Kardex");
	$pdf->SetCliente($cliente);
	$pdf->SetRuc($ruc);
	$pdf->SetDireccion($direccion);
	$pdf->SetNumero($numero);	
	$pdf->SetFecha($fecha);		
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->SetLineWidth(0.3);
	$pdf->SetMargins(8, 50, 10);
	$pdf->SetHeaderMargin(10);
	$pdf->setListIndentWidth(4);
	$pdf->addPage();
	$codigoHTML = '';
//========================================================	
?>
<?php
$codigoHTML='
<html>
<head>
<title></title>';
$codigoHTML.='<style>
body{font-family:Arial, Helvetica, sans-serif;font-size:9pt;}
.tabla{font-size:7pt;}
th{background-color:#ccc;text-align:center;font-weight:bolder;}
.tc{text-align:center}
.tr{text-align:right}
.tt{background-color:#dfdfdf;font-weight:bolder;font-size:10pt;}
.total{background-color:#ccc;font-weight:bolder;font-size:10pt;}
</style>';

$codigoHTML.='</head>
<body>';
//========================



$codigoHTML.='
<table width="100%" border="1" class="tabla" cellspacing="0" cellpadding="1">
  <tr>
		  <th width="30" data-campo="" class="uk-visible@s">ITEM</th>
		  <th width="30" data-campo="" class="uk-visible@s">CANT.</th>
		  <th width="60" data-campo="" class="uk-visible@s">MARCA</th>
		  <th width="80" data-campo="" class="uk-visible@s">GRUPO</th>
		  <th width="60" data-campo="" class="uk-visible@s">CODIGO</th>
		  <th width="110" data-campo="" class="uk-visible@s">PRODUCTO</th>
		  <th width="25" data-campo="" class="uk-visible@s">UM</th>
		  <th width="60" data-campo="" class="uk-visible@s">OBSERV.</th>		  
		  <th width="40" data-campo="" class="uk-visible@s">P/U</th>
		  <th width="50" data-campo="" class="uk-visible@s">IMPORTE</th>

  </tr>
';
	//=================================================	
	$campos="*";
	$condicion="fk_salida='$fk_salida'";
	$ds=$general->listarRegistros("salida_detalle","pk_salida_detalle","asc",1,$condicion,$campos);
	
	$total=0;
	$n=1;
	while($fila=$ds->fetch_array(MYSQLI_ASSOC)){  
	$cantidad=$fila['sade_cantidad'];
	$precio=$fila['sade_producto_pu'];
	$importe=$cantidad*$precio;
	$total+=$importe;
		//=========================		
	$codigoHTML.='	
		<tr>
			<td class="tc">'.$n++.'</td>
			<td class="tc">'.$cantidad.'</td>
			<td>'.$fila['sade_marca_nombre'].'</td>
			<td>'.$fila['sade_grupo_nombre'].'</td>
			<td class="tc">'.$fila['sade_producto_codigo'].'</td>
			<td>'.$fila['sade_producto_nombre'].'</td>
			<td class="tc">'.$fila['sade_prodcuto_um'].'</td>
			<td>'.$fila['sade_observacion'].'</td>			
			<td class="tr">'.number_format($precio,2,'.',',').'</td>
			<td class="tr">'.number_format($importe,2,'.',',').'</td>				
		</tr>';
	
		//=======================
		
	}//end while
	//=======================
$codigoHTML.='</table>';

$codigoHTML.='
&nbsp;<br />
<table width="100%" border="1" class="tabla" cellspacing="0" cellpadding="1">
  <tr>
  	<td align="right" width="458">TOTAL:</td>
	<td  align="right" class="total" width="90">'.number_format($total,2,'.',',').'</td>
  </tr>
</table>';


$codigoHTML.='
</body>
</html>
';
	?>
<?php
//====================================================
	$pdf->writeHTML($codigoHTML, true, 0, true, 0);
	$pdf->lastPage();
	$pdf->output('reporte_kardex.pdf', 'I');
//====================================================	
?>