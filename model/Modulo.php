<?php
require_once('Conexion.php');
class Modulo{
private $fk_carrera;
private $modu_nombre;
//-----------------------------
private $tb="modulo";
private $tb_pk="pk_modulo";
public function __construct($fk_carrera="",
						$modu_nombre=""){
							$this->fk_carrera=$fk_carrera;
							$this->modu_nombre=addslashes($modu_nombre);
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('Modulo', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('Modulo',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_carrera,
						modu_nombre
						) values(
						'$this->fk_carrera',
						'$this->modu_nombre')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_carrera='$this->fk_carrera',
						modu_nombre='$this->modu_nombre'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>