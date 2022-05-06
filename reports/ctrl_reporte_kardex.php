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
$fk_producto=$_GET['fk_producto'];
	$condicion2="fk_producto='$fk_producto'";
	$ds2=$general->listarRegistros("almacen","pk_almacen","asc",1,$condicion2);	
	$fila2=$ds2->fetch_assoc();
	$marca=$fila2['alma_marca_nombre'];
	$grupo=$fila2['alma_grupo_nombre'];
	$codigo=$fila2['alma_producto_codigo'];
	$producto=$fila2['alma_producto_nombre'];
//--------------------------------------------------------------------	
	
class MYPDF extends TCPDF {
	protected $producto;
	protected $codigo;
    public function setProducto($var){
        $this->producto = $var;
    }
	public function setCodigo($var){
        $this->codigo = $var;
    }
    public function setMarca($var){
        $this->marca = $var;
    }
    public function setGrupo($var){
        $this->grupo = $var;
    }		

	public function Header() {
		$image_file = K_PATH_IMAGES."logo_color.jpg";
		$this->Image($image_file,12, 3, 29, "", "JPG", "", "T", false, 300, "", false, false, 0, false, false, false);
		 $this->SetFont('helvetica', 'N', 7);
		$this->Cell(0, 8, date("d/m/Y H:i:s"), 0, false, 'R', 0, '', 0, false, 'T', 'M');
		 $this->SetFont('helvetica', 'B', 18);
		$this->MultiCell(0, 10,"KARDEX", 0, 'C', 0, 0, '', '14', true,0,true);
		$this->SetFont('helvetica', 'B', 12);
		$this->MultiCell(0, 10,$this->producto, 0, 'C', 0, 0, '', '22', true,0,true);
		$this->SetFont('helvetica', 'N', 9);
		$style = array("width" => 0.1, "cap" => "butt", "join" => "miter", "dash" => 0, "color" => array(00,00,00));
		$this->Line(10, 28, 200, 28, $style);
		$this->Line(10, 47, 200, 47, $style);
		$this->MultiCell(0, 10,"CODIGO: <b>".$this->codigo."</b><br />MARCA: <b>".$this->marca."</b><br />GRUPO: <b>".$this->grupo."</b><br />PRODUCTO: <b>".$this->producto."</b>", 0, 'L', 0, 0, '10', '30', true,0,true);
		$this->MultiCell(0, 10,"AÑO: <b>".date("Y")."</b>", 0, 'R', 0, 0, '0', '30', true,0,true);
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
	$pdf->SetProducto($producto);
	$pdf->SetCodigo($codigo);
	$pdf->SetMarca($marca);
	$pdf->SetGrupo($grupo);		
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
.tabla{font-size:8pt;}
th{background-color:#ccc;text-align:center;font-weight:bolder;}
.tc{text-align:center}
.tr{text-align:right}
.tt{background-color:#dfdfdf;font-weight:bolder;font-size:10pt;}
.total{background-color:#ccc;font-weight:bolder;font-size:10pt;}
.ex{background-color:#B6D53D;}
.sa{background-color:#DC4E41;}
.en{background-color:#28AFEA;}
</style>';

$codigoHTML.='</head>
<body>';
//========================



$codigoHTML.='
<table width="100%" border="1" class="tabla" cellspacing="0" cellpadding="1">
  <tr>
	  <th width="60">FECHA OP.</th>
	  <th width="40">OPE.</th>
	  <th width="100">OPERACION</th>
	  <th width="110">DOCUMENTO</th>
	  <th width="50">NUM. DOC.</th>
	  <th width="50">ENTRADA</th>
	  <th width="50">SALIDA</th>
	  <th width="80">SALDO</th>
  </tr>
';
	//=================================================	
	$campos="*";
	$condicion="fk_producto='$fk_producto'";
	$ds=$general->listarRegistros("kardex","pk_kardex","asc",1,$condicion,$campos);
			
	$total_entrada=0;
	$total_salida=0;
	$total=0;
	while($fila=$ds->fetch_array(MYSQLI_ASSOC)){  
	$total_entrada+=$fila['kard_cantidad_entrada'];
	$total_salida+=$fila['kard_cantidad_salida'];
	$total=$total_entrada-$total_salida;
		//=========================		
	$codigoHTML.='	
		<tr>
			<td class="tc">'.date("d/m/Y",strtotime($fila['kard_operacion_fecha'])).'</td>
			<td class="tc">'.$fila['kard_movimiento_tipo'].'</td>
			<td>'.$fila['kard_operacion_nombre'].'</td>
			<td>'.$fila['kard_documento_nombre'].'</td>
			<td class="tr">'.$fila['kard_documento_numero'].'</td>
			<td class="tr">'.$fila['kard_cantidad_entrada'].'</td>
			<td class="tr">'.$fila['kard_cantidad_salida'].'</td>
			<td class="tr">'.$total.'</td>					
		</tr>';
	
		//=======================
		
	}//end while
	//=======================
$codigoHTML.='</table>';

$codigoHTML.='
&nbsp;<br />
<table width="100%" border="1" class="tabla" cellspacing="0" cellpadding="1">
  <tr>
  	<td align="right" width="363">TOTAL EXISTENCIAS:</td>
  	<td  align="right" class="tt" bgcolor="#66CCFF" width="50">'.$total_entrada.'</td>
	<td  align="right" class="tt" bgcolor="#FF6600" width="50">'.$total_salida.'</td>
	<td  align="right" class="total" bgcolor="#99CC00" width="80">'.$total.'</td>
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