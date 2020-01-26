<?php
require 'conexion.php';

function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_pagina, $conexion){
	$grupo = $_SESSION['usuario']['4'];
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_pagina - $post_pagina : 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM `foro` WHERE id_grupo = $grupo ORDER BY `foro`.`fecha_pub` DESC LIMIT $inicio , $post_pagina");
	$sentencia->execute();    
    
    return $sentencia->fetchAll();

}

function obtener_usuario($id, $conexion){
	$usuario = $conexion->prepare("SELECT nombre FROM usuarios WHERE id = $id");
	$usuario->execute();
	return $usuario->fetch();
}

?>