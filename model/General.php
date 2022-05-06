<?php
require_once('Conexion.php');
class General{
	

	public function getNumeroRegistros($tb,$cond="0",$cond_string=""){
	  $con=new Conexion();
	  if($cond=="0"){
		  $sql="SELECT COUNT(*) as total FROM ".$tb;
	  }else{
		  $sql="SELECT COUNT(*) as total FROM ".$tb."  WHERE ".$cond_string;
	  }
 	  $ds=$con->query($sql);
	  $con->close();
	  
 		$tr=$ds->num_rows;
		$fila=$ds->fetch_assoc();
		$valor=$fila['total'];
	  
	  return $valor; 
	}
	
	public function valorCampo($tb,$campo,$cond_string){
	  $con=new Conexion();
	  $sql="SELECT ".$campo." FROM  ".$tb."  WHERE ".$cond_string;
	  $ds=$con->query($sql);
	  $con->close();
	  
	  	$tr=$ds->num_rows;
		$valor="";
		if ($tr>0){
			$fila=$ds->fetch_assoc();
			$valor=$fila[$campo];
		}
	  return $valor;
	}
		
	public function modificarRegistro($tb,$campo_pk,$pk){ //se usa como ds para modificar los registros
		$con=new Conexion();
		$sql="select * from ".$tb." where ".$campo_pk."='$pk'";
		$ds=$con->query($sql);
			$tr=$ds->num_rows;
			if ($tr<1){
				$ds="0";
			}
		$con->close();
		return $ds;
	}
		
	public function modificarCampos($tb,$campos_y_valores,$cond="0",$cond_string=""){
		if($cond=="0"){
			$sql="UPDATE ".$tb." SET ".$campos_y_valores;
		}else{
			$sql="UPDATE ".$tb." SET ".$campos_y_valores." where ".$cond_string;
		}
		$con=new Conexion();
		$con->query($sql);
		$return_query=$con->affected_rows;
		$con->close();
		return $return_query;
	}
	
	public function sumarCampo($tb,$campo,$cond_string){
	  $con=new Conexion();
	  $sql="SELECT sum(".$campo.") as total FROM  ".$tb."  WHERE ".$cond_string;
	  $ds=$con->query($sql);
	  $con->close();
	  
	  $fila=$ds->fetch_assoc();
	  $total=$fila['total'];
	  return $total;
	}
	
	public function eliminarRegistro($tb,$campo_pk,$pk,$cond="0",$cond_string=""){
		$con=new Conexion();
		if($cond=="0"){
			$sql="delete from ".$tb." WHERE ".$campo_pk."='$pk'";
		}else{
			$sql="delete from ".$tb." WHERE ".$cond_string;
		}
		$con->query($sql);
		$return_query=$con->affected_rows;
		$con->close();
		
		return $return_query;
	}
	
		
	public function existenRegitros($tb,$cond="0",$cond_string=""){
		$con=new Conexion();
		if($cond=="0"){
			$sql="select * from ".$tb." limit 1";
		}else{
			$sql="select * from ".$tb." where ".$cond_string." limit 1";
		}

		$ds=$con->query($sql);
		$con->close();
		$tr=$ds->num_rows;

		$existe=false;
		if ($tr>0){
			$existe=true;
		}
		return $existe;
	}


	public function listarSQL($sql){
		$con=new Conexion();
		$ds=$con->query($sql);
		$con->close();
		return $ds;
	}

	public function listarRegistros($tb,$campo_order,$order="desc",$cond="0",$cond_string="",$campos="*"){
		$con=new Conexion();
		if($cond=="0"){
			$sql="select ".$campos." from ".$tb." ORDER BY ".$campo_order." ".$order;
		}elseif($cond=="1"){
			$sql="select ".$campos." from ".$tb." WHERE ".$cond_string." ORDER BY ".$campo_order." ".$order;
		
		}
		
		$ds=$con->query($sql);
		$con->close();
		return $ds;
	}

	public function listarBuscar($tb,$campo_buscar,$txt,$cond="0",$cond_string="",$campos="*"){
		$con=new Conexion();
		if($cond=="0"){
			$sql="select ".$campos." from ".$tb." where ".$campo_buscar." like '%$txt%'";
		}else{
			$sql="select ".$campos." from ".$tb." where ".$campo_buscar." like '%$txt%' ".$cond_string;
		}
		$ds=$con->query($sql);
		$con->close();
		return $ds;
	}
	
	public function ultimoPK($tb,$campo,$cond="0",$cond_string=""){
		$con=new Conexion();
		if($cond=="0"){
			$sql="select max(".$campo.") as ultimo_pk from ".$tb;
		}else{
			$sql="select max(".$campo.") as ultimo_pk from ".$tb." where ".$cond_string;
		}
		$ds=$con->query($sql);
		$con->close();
		$fila=$ds->fetch_assoc();
		$upk=$fila['ultimo_pk'];
		
		return $upk;
	}
		
} //end class
?>