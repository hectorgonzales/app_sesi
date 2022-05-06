<?php
require_once('Conexion.php');
class Ud{
private $fk_carrera;
private $fk_modulo;
private $ud_tipo;
private $ud_nombre;
private $ud_semestre;
private $ud_horas;
//-----------------------------
private $tb="ud";
private $tb_pk="pk_ud";
public function __construct($fk_carrera="",
						$fk_modulo="",
						$ud_tipo="",
						$ud_nombre="",
						$ud_semestre="",
						$ud_horas=""){
							$this->fk_carrera=$fk_carrera;
							$this->fk_modulo=$fk_modulo;
							$this->ud_tipo=$ud_tipo;
							$this->ud_nombre=addslashes($ud_nombre);
							$this->ud_semestre=$ud_semestre;
							$this->ud_horas=$ud_horas;
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('Ud', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('Ud',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_carrera,
						fk_modulo,
						ud_tipo,
						ud_nombre,
						ud_semestre,
						ud_horas
						) values(
						'$this->fk_carrera',
						'$this->fk_modulo',
						'$this->ud_tipo',
						'$this->ud_nombre',
						'$this->ud_semestre',
						'$this->ud_horas')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_carrera='$this->fk_carrera',
						fk_modulo='$this->fk_modulo',
						ud_tipo='$this->ud_tipo',
						ud_nombre='$this->ud_nombre',
						ud_semestre='$this->ud_semestre',
						ud_horas='$this->ud_horas'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>