<?php
date_default_timezone_set('America/Lima');
class Conexion extends mysqli{ 
	private $host="localhost";
	private $user="root"; 
	private $pass=""; 
	private $port="3306";
	private $db="appsesi";

	public function __construct(){
		parent:: __construct($this->host, $this->user, $this->pass,$this->db,$this->port);
		$this->set_charset("utf8");
	}
}
?>