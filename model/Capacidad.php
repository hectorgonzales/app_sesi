<?php
require_once('Conexion.php');
class Capacidad{
private $fk_ud;
private $capa_descripcion;
//-----------------------------
private $tb="capacidad";
private $tb_pk="pk_capacidad";
public function __construct($fk_ud="",
						$capa_descripcion=""){
							$this->fk_ud=$fk_ud;
							$this->capa_descripcion=addslashes($capa_descripcion);
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('Capacidad', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('Capacidad',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_ud,
						capa_descripcion
						) values(
						'$this->fk_ud',
						'$this->capa_descripcion')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_ud='$this->fk_ud',
						capa_descripcion='$this->capa_descripcion'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>