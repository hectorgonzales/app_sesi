<?php
require_once('Conexion.php');
class SesionActividad{
private $fk_sesion;
private $seac_momento;
private $seac_actividad;
private $seac_recurso;
private $seac_recurso_icono;
private $seac_tiempo;
//-----------------------------
private $tb="sesion_actividad";
private $tb_pk="pk_sesion_actividad";
public function __construct($fk_sesion="",
						$seac_momento="",
						$seac_actividad="",
						$seac_recurso="",
						$seac_recurso_icono="",
						$seac_tiempo=""){
							$this->fk_sesion=$fk_sesion;
							$this->seac_momento=$seac_momento;
							$this->seac_actividad=$seac_actividad;
							$this->seac_recurso=$seac_recurso;
							$this->seac_recurso_icono=$seac_recurso_icono;
							$this->seac_tiempo=$seac_tiempo;
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('SesionActividad', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('SesionActividad',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_sesion,
						seac_momento,
						seac_actividad,
						seac_recurso,
						seac_recurso_icono,
						seac_tiempo
						) values(
						'$this->fk_sesion',
						'$this->seac_momento',
						'$this->seac_actividad',
						'$this->seac_recurso',
						'$this->seac_recurso_icono',
						'$this->seac_tiempo')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_sesion='$this->fk_sesion',
						seac_momento='$this->seac_momento',
						seac_actividad='$this->seac_actividad',
						seac_recurso='$this->seac_recurso',
						seac_recurso_icono='$this->seac_recurso_icono',
						seac_tiempo='$this->seac_tiempo'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>