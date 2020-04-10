<?php
session_start();
include_once 'conexion.php';
$conexion = conexion($db_config);

if(!empty($_POST['borrar'])){
    $statement = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
    $statement->execute(array(":id" => $_POST['id']));
    $error.="El usuario se ha eliminado correctamente!!";
    header("location: ../admin/usuarios.php?a=2");
}

$stat = $conexion->prepare("SELECT usuarios.id,usuarios.no_control, detalle_usuarios.nombre, detalle_usuarios.a_paterno, detalle_usuarios.a_materno,usuarios.grupo FROM `usuarios`	LEFT JOIN `detalle_usuarios` ON `detalle_usuarios`.`id_usuario` = `usuarios`.`id` WHERE `usuarios`.`tipo`=2 ORDER BY  `usuarios`.`grupo` ASC");

$stat->execute();
$tutores = $stat->fetchAll();

$s = $conexion->prepare("SELECT usuarios.id,usuarios.no_control, detalle_usuarios.nombre, detalle_usuarios.a_paterno, detalle_usuarios.a_materno,detalle_usuarios.grupo,detalle_usuarios.semestre,detalle_usuarios.carrera FROM `usuarios`	LEFT JOIN `detalle_usuarios` ON `detalle_usuarios`.`id_usuario` = `usuarios`.`id` WHERE `usuarios`.`tipo`=3 ORDER BY  `usuarios`.`grupo` ASC");
$s->execute();
$alumnos = $s->fetchAll();

?>