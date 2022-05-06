<?php
require_once('Conexion.php');
class CompetenciaEmpleabilidad{
private $fk_modulo;
private $coem_descripcion;
//-----------------------------
private $tb="competencia_empleabilidad";
private $tb_pk="pk_competencia_empleabilidad";
public function __construct($fk_modulo="",
						$coem_descripcion=""){
							$this->fk_modulo=$fk_modulo;
							$this->coem_descripcion=addslashes($coem_descripcion);
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('CompetenciaEmpleabilidad', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('CompetenciaEmpleabilidad',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_modulo,
						coem_descripcion
						) values(
						'$this->fk_modulo',
						'$this->coem_descripcion')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_modulo='$this->fk_modulo',
						coem_descripcion='$this->coem_descripcion'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>