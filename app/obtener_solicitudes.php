<?php
/*require 'conexion.php';*/

//$conexion = conexion($db_config);

$statement = $conexion->prepare('SELECT * FROM solicitudes_registro WHERE tipo = 3');
$statement->execute();
$resultado = $statement->fetchAll();

$sol = $conexion->prepare('SELECT * FROM solicitudes_registro WHERE tipo = 2');
$sol->execute();
$tutores = $sol->fetchAll();

?>