<?php
date_default_timezone_set('America/Lima');
class Conexion extends mysqli{ 
	private $host="localhost";
	private $user="root"; 
	private $pass=""; 
	private $port="3306";
	private $db="appsesi";
    
    // private $host="localhost";
	// private $user="persson_usesi"; 
	// private $pass="hqNKF9=SMy}m"; 
	// private $port="3306";
	// private $db="persson_sesi";

	public function __construct(){
		parent:: __construct($this->host, $this->user, $this->pass,$this->db,$this->port);
		$this->set_charset("utf8");
	}
}
?>