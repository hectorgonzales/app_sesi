<?php
require_once('Conexion.php');
class Usuario{
private $usua_usuario;
private $usua_login;
private $usua_password;
private $usua_estado;
private $usua_tipo;
private $usua_privilegios;
private $usua_fecha_creacion;
//-----------------------------
private $tb="usuario";
private $tb_pk="pk_usuario";
public function __construct($usua_usuario="",$usua_login="",$usua_password="",$usua_estado="",$usua_tipo="",$usua_privilegios="",$usua_fecha_creacion=""){
$this->usua_usuario=htmlentities(mb_strtoupper($usua_usuario),ENT_QUOTES);
$this->usua_login=htmlentities($usua_login,ENT_QUOTES);
$this->usua_password=$usua_password;
$this->usua_estado=$usua_estado;
$this->usua_tipo=$usua_tipo;
$this->usua_privilegios=$usua_privilegios;
$this->usua_fecha_creacion=$usua_fecha_creacion;
}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('Usuario', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('Usuario',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (usua_usuario,
						usua_login,
						usua_password,
						usua_estado,
						usua_tipo,
						usua_privilegios,
						usua_fecha_creacion
						) values(
						'$this->usua_usuario',
						'$this->usua_login',
						'$this->usua_password',
						'$this->usua_estado',
						'$this->usua_tipo',
						'$this->usua_privilegios',
						'$this->usua_fecha_creacion')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk,$sinpassword="0"){
  $con=new Conexion();
  if($sinpassword=="0"){
  	$sql="update ".$this->tb." set usua_usuario='$this->usua_usuario',usua_login='$this->usua_login',usua_password='$this->usua_password',usua_estado='$this->usua_estado',usua_tipo='$this->usua_tipo',usua_privilegios='$this->usua_privilegios' WHERE ".$this->tb_pk."='$pk'";
  }else{
  	$sql="update ".$this->tb." set usua_usuario='$this->usua_usuario',usua_login='$this->usua_login',usua_estado='$this->usua_estado',usua_tipo='$this->usua_tipo',usua_privilegios='$this->usua_privilegios' WHERE ".$this->tb_pk."='$pk'";
  }
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $sinpassword;
}



}
?>