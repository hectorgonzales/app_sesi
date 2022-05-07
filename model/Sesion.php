<?php
require_once('Conexion.php');
class Sesion{
private $fk_usuario;
private $fk_ud;
private $sesi_orden;
private $sesi_docente;
private $sesi_anio;
private $sesi_periodo;
private $sesi_horas;
private $sesi_hora_sincrona;
private $sesi_hora_asincrona;
private $sesi_carrera;
private $fks_competencia_especifica;
private $sesi_comp_especifica;
private $fks_competencia_empleabilidad;
private $sesi_comp_empleabilidad;
private $fk_modulo;
private $sesi_modulo;
private $sesi_ud;
private $fks_capacidad;
private $sesi_capacidad;
private $fks_capacidad_logro;
private $sesi_capacidad_logro;
private $sesi_tema;
private $sesi_act_practico;
private $sesi_act_teopractico;
private $sesi_tipo_presencial;
private $sesi_tipo_virtsincrono;
private $sesi_tipo_virtasincrono;
private $sesi_fecha;
private $plap_indicador_competencia;
private $plap_indicador_capacidad;
private $plap_logro_sesion;
private $inicio_estrategia;
private $desarrollo_estrategia;
private $cierre_estrategia;
private $eva_indicador_logro;
private $fk_eva_tecnica;
private $eva_tecnicas;
private $fk_eva_tecnica_instrumento;
private $eva_instrumentos;
private $eva_peso;
private $eva_momento;
private $biblio_docente;
private $biblio_estudiante;
//-----------------------------
private $tb="sesion";
private $tb_pk="pk_sesion";
public function __construct($fk_usuario="",
						$fk_ud="",
						$sesi_orden="",
						$sesi_docente="",
						$sesi_anio="",
						$sesi_periodo="",
						$sesi_horas="",
						$sesi_hora_sincrona="",
						$sesi_hora_asincrona="",
						$sesi_carrera="",
						$fks_competencia_especifica="",
						$sesi_comp_especifica="",
						$fks_competencia_empleabilidad="",
						$sesi_comp_empleabilidad="",
						$fk_modulo="",
						$sesi_modulo="",
						$sesi_ud="",
						$fks_capacidad="",
						$sesi_capacidad="",
						$fks_capacidad_logro="",
						$sesi_capacidad_logro="",
						$sesi_tema="",
						$sesi_act_practico="",
						$sesi_act_teopractico="",
						$sesi_tipo_presencial="",
						$sesi_tipo_virtsincrono="",
						$sesi_tipo_virtasincrono="",
						$sesi_fecha="",
						$plap_indicador_competencia="",
						$plap_indicador_capacidad="",
						$plap_logro_sesion="",
						$inicio_estrategia="",
						$desarrollo_estrategia="",
						$cierre_estrategia="",
						$eva_indicador_logro="",
						$fk_eva_tecnica="",
						$eva_tecnicas="",
						$fk_eva_tecnica_instrumento="",
						$eva_instrumentos="",
						$eva_peso="",
						$eva_momento="",
						$biblio_docente="",
						$biblio_estudiante=""){
							$this->fk_usuario=$fk_usuario;
							$this->fk_ud=$fk_ud;
							$this->sesi_orden=$sesi_orden;
							$this->sesi_docente=$sesi_docente;
							$this->sesi_anio=$sesi_anio;
							$this->sesi_periodo=$sesi_periodo;
							$this->sesi_horas=$sesi_horas;
							$this->sesi_hora_sincrona=$sesi_hora_sincrona;
							$this->sesi_hora_asincrona=$sesi_hora_asincrona;
							$this->sesi_carrera=$sesi_carrera;
							$this->fks_competencia_especifica=$fks_competencia_especifica;
							$this->sesi_comp_especifica=$sesi_comp_especifica;
							$this->fks_competencia_empleabilidad=$fks_competencia_empleabilidad;
							$this->sesi_comp_empleabilidad=$sesi_comp_empleabilidad;
							$this->fk_modulo=$fk_modulo;
							$this->sesi_modulo=$sesi_modulo;
							$this->sesi_ud=$sesi_ud;
							$this->fks_capacidad=$fks_capacidad;
							$this->sesi_capacidad=$sesi_capacidad;
							$this->fks_capacidad_logro=$fks_capacidad_logro;
							$this->sesi_capacidad_logro=$sesi_capacidad_logro;
							$this->sesi_tema=$sesi_tema;
							$this->sesi_act_practico=$sesi_act_practico;
							$this->sesi_act_teopractico=$sesi_act_teopractico;
							$this->sesi_tipo_presencial=$sesi_tipo_presencial;
							$this->sesi_tipo_virtsincrono=$sesi_tipo_virtsincrono;
							$this->sesi_tipo_virtasincrono=$sesi_tipo_virtasincrono;
							$this->sesi_fecha=$sesi_fecha;
							$this->plap_indicador_competencia=$plap_indicador_competencia;
							$this->plap_indicador_capacidad=$plap_indicador_capacidad;
							$this->plap_logro_sesion=$plap_logro_sesion;
							$this->inicio_estrategia=$inicio_estrategia;
							$this->desarrollo_estrategia=$desarrollo_estrategia;
							$this->cierre_estrategia=$cierre_estrategia;
							$this->eva_indicador_logro=$eva_indicador_logro;
							$this->fk_eva_tecnica=$fk_eva_tecnica;
							$this->eva_tecnicas=$eva_tecnicas;
							$this->fk_eva_tecnica_instrumento=$fk_eva_tecnica_instrumento;
							$this->eva_instrumentos=$eva_instrumentos;
							$this->eva_peso=$eva_peso;
							$this->eva_momento=$eva_momento;
							$this->biblio_docente=$biblio_docente;
							$this->biblio_estudiante=$biblio_estudiante;
							}
//-------------GETTER AND SETTER----------------
public function __get($attr){
	$atributo = strtolower($attr);
	if (property_exists('Sesion', $atributo)){
		return $this->$attr;
 	}
	return NULL;
}

public function __set($attr,$val){
	$atributo = strtolower($attr);
	if(property_exists('Sesion',$atributo)){
		$this->$attr=$val;
 	}else{
		echo $attr." No existe atributo.";
 	}	
}
//-----------------------------

public function insertar(){
  $con=new Conexion();
  $sql="insert into ".$this->tb." (fk_usuario,
						fk_ud,
						sesi_orden,
						sesi_docente,
						sesi_anio,
						sesi_periodo,
						sesi_horas,
						sesi_hora_sincrona,
						sesi_hora_asincrona,
						sesi_carrera,
						fks_competencia_especifica,
						sesi_comp_especifica,
						fks_competencia_empleabilidad,
						sesi_comp_empleabilidad,
						fk_modulo,
						sesi_modulo,
						sesi_ud,
						fks_capacidad,
						sesi_capacidad,
						fks_capacidad_logro,
						sesi_capacidad_logro,
						sesi_tema,
						sesi_act_practico,
						sesi_act_teopractico,
						sesi_tipo_presencial,
						sesi_tipo_virtsincrono,
						sesi_tipo_virtasincrono,
						sesi_fecha,
						plap_indicador_competencia,
						plap_indicador_capacidad,
						plap_logro_sesion,
						inicio_estrategia,
						desarrollo_estrategia,
						cierre_estrategia,
						eva_indicador_logro,
						fk_eva_tecnica,
						eva_tecnicas,
						fk_eva_tecnica_instrumento,
						eva_instrumentos,
						eva_peso,
						eva_momento,
						biblio_docente,
						biblio_estudiante
						) values(
						'$this->fk_usuario',
						'$this->fk_ud',
						'$this->sesi_orden',
						'$this->sesi_docente',
						'$this->sesi_anio',
						'$this->sesi_periodo',
						'$this->sesi_horas',
						'$this->sesi_hora_sincrona',
						'$this->sesi_hora_asincrona',
						'$this->sesi_carrera',
						'$this->fks_competencia_especifica',
						'$this->sesi_comp_especifica',
						'$this->fks_competencia_empleabilidad',
						'$this->sesi_comp_empleabilidad',
						'$this->fk_modulo',
						'$this->sesi_modulo',
						'$this->sesi_ud',
						'$this->fks_capacidad',
						'$this->sesi_capacidad',
						'$this->fks_capacidad_logro',
						'$this->sesi_capacidad_logro',
						'$this->sesi_tema',
						'$this->sesi_act_practico',
						'$this->sesi_act_teopractico',
						'$this->sesi_tipo_presencial',
						'$this->sesi_tipo_virtsincrono',
						'$this->sesi_tipo_virtasincrono',
						'$this->sesi_fecha',
						'$this->plap_indicador_competencia',
						'$this->plap_indicador_capacidad',
						'$this->plap_logro_sesion',
						'$this->inicio_estrategia',
						'$this->desarrollo_estrategia',
						'$this->cierre_estrategia',
						'$this->eva_indicador_logro',
						'$this->fk_eva_tecnica',
						'$this->eva_tecnicas',
						'$this->fk_eva_tecnica_instrumento',
						'$this->eva_instrumentos',
						'$this->eva_peso',
						'$this->eva_momento',
						'$this->biblio_docente',
						'$this->biblio_estudiante')";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}	

public function actualizar($pk){
  $con=new Conexion();
  $sql="update ".$this->tb." set fk_usuario='$this->fk_usuario',
						fk_ud='$this->fk_ud',
						sesi_orden='$this->sesi_orden',
						sesi_docente='$this->sesi_docente',
						sesi_anio='$this->sesi_anio',
						sesi_periodo='$this->sesi_periodo',
						sesi_horas='$this->sesi_horas',
						sesi_hora_sincrona='$this->sesi_hora_sincrona',
						sesi_hora_asincrona='$this->sesi_hora_asincrona',
						sesi_carrera='$this->sesi_carrera',
						fks_competencia_especifica='$this->fks_competencia_especifica',
						sesi_comp_especifica='$this->sesi_comp_especifica',
						fks_competencia_empleabilidad='$this->fks_competencia_empleabilidad',
						sesi_comp_empleabilidad='$this->sesi_comp_empleabilidad',
						fk_modulo='$this->fk_modulo',
						sesi_modulo='$this->sesi_modulo',
						sesi_ud='$this->sesi_ud',
						fks_capacidad='$this->fks_capacidad',
						sesi_capacidad='$this->sesi_capacidad',
						fks_capacidad_logro='$this->fks_capacidad_logro',
						sesi_capacidad_logro='$this->sesi_capacidad_logro',
						sesi_tema='$this->sesi_tema',
						sesi_act_practico='$this->sesi_act_practico',
						sesi_act_teopractico='$this->sesi_act_teopractico',
						sesi_tipo_presencial='$this->sesi_tipo_presencial',
						sesi_tipo_virtsincrono='$this->sesi_tipo_virtsincrono',
						sesi_tipo_virtasincrono='$this->sesi_tipo_virtasincrono',
						sesi_fecha='$this->sesi_fecha',
						plap_indicador_competencia='$this->plap_indicador_competencia',
						plap_indicador_capacidad='$this->plap_indicador_capacidad',
						plap_logro_sesion='$this->plap_logro_sesion',
						inicio_estrategia='$this->inicio_estrategia',
						desarrollo_estrategia='$this->desarrollo_estrategia',
						cierre_estrategia='$this->cierre_estrategia',
						eva_indicador_logro='$this->eva_indicador_logro',
						fk_eva_tecnica='$this->fk_eva_tecnica',
						eva_tecnicas='$this->eva_tecnicas',
						fk_eva_tecnica_instrumento='$this->fk_eva_tecnica_instrumento',
						eva_instrumentos='$this->eva_instrumentos',
						eva_peso='$this->eva_peso',
						eva_momento='$this->eva_momento',
						biblio_docente='$this->biblio_docente',
						biblio_estudiante='$this->biblio_estudiante'
						 WHERE ".$this->tb_pk."='$pk'";
  $con->query($sql);
  $return_query=$con->affected_rows;
  $con->close();
  return $return_query;
}

}
?>