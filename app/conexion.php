<?php
//------------------------[DATOS SERVIDOR]------------------------//

$db_config = array('db' => 'jose_tesis', 'user' => 'root', 'pass' => '');

//----------------------------------------------------------------//

function conexion($db_config){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$db_config['db'],$db_config['user'],$db_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		echo "Errores: " . $e->getMessage();
		return false;
	}
}