<?php
require_once('Conexion.php');
class UdUsuario{
private $fk_usuario;
private $fk_ud;
//-----------------------------
private $tb="ud_usuario";
private $tb_pk="pk_ud_usuario";
public function __construct($fk_usuario="",
						$fk_ud=""){
							$this->fk_usuario=$fk_usuario;
							$this->fk_ud=$fk_ud;
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('UdUsuario', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('UdUsuario',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_usuario,
						fk_ud
						) values(
						'$this->fk_usuario',
						'$this->fk_ud')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_usuario='$this->fk_usuario',
						fk_ud='$this->fk_ud'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>