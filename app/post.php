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
	$usuario = $conexion->prepare("SELECT nombre,a_paterno, a_materno FROM detalle_usuarios WHERE id_usuario = $id");
	$usuario->execute();
	$u = $usuario->fetch();
	$datos = array();
	$datos['nombre'] = "".$u[0]." ".$u[1]." ".$u[2]."";
	return $datos;
}

if (isset($_POST['EnviarPlan'])) {
	$errores = '';
		
			$conexion = conexion($db_config);

			$statement = $conexion->prepare("UPDATE `formatos_tutor` SET `estado`= 1 WHERE id= :id");
			$statement->execute(array(":id" => $_POST['id']));
			$errores = "¡Archivo subido exitosamente!";
            echo $errores;
            header('Location:../tutor/T-centro_act.php?a=1&g='.$_GET['g'].'');
		
	}

if(isset($_POST['delete'])){
    $name = $_POST['file'];

    $conexion = conexion($db_config);
    
    $statement = $conexion->prepare("DELETE FROM `formatos_tutor` WHERE id = ".$_POST['id']."");
    $statement->execute();
    
    unlink("../docs/planificacion/".$_GET['g']."/$name.pdf");
      unlink("../docs/html/".$_GET['g']."/$name.html");
    $errores = "Archivo eliminado correctamente.";
    print_r($statement);
    header("Location:../tutor/T-centro_act.php?a=2&g=".$_GET['g']."");
    
}

?>