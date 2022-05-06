<?php
require_once('Conexion.php');
class CapacidadLogro{
private $fk_capacidad;
private $calo_descripcion;
//-----------------------------
private $tb="capacidad_logro";
private $tb_pk="pk_capacidad_logro";
public function __construct($fk_capacidad="",
						$calo_descripcion=""){
							$this->fk_capacidad=$fk_capacidad;
							$this->calo_descripcion=$calo_descripcion;
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('CapacidadLogro', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('CapacidadLogro',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_capacidad,
						calo_descripcion
						) values(
						'$this->fk_capacidad',
						'$this->calo_descripcion')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_capacidad='$this->fk_capacidad',
						calo_descripcion='$this->calo_descripcion'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>