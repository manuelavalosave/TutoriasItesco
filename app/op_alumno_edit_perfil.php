<?php
session_start();
include_once 'conexion.php';
$conexion = conexion($db_config);
if(!empty($_POST['guardar'])){
    $save = $conexion->prepare("UPDATE detalle_usuarios SET direccion = :direccion, num_tel = :num_tel, email = :email, edit = 2 WHERE id_usuario = :id");
    $save->execute(array(':direccion' => $_POST['direccion'], ':num_tel' => $_POST['num_tel'], ':email' => $_POST['email'], ':id' => $_SESSION['usuario']['0']));
    header('Location: ../alumno/index.php');
}

$stat = $conexion->prepare("SELECT direccion, num_tel ,email FROM detalle_usuarios WHERE id_usuario = :usuario");
$stat->execute(array(":usuario" => $_SESSION['usuario']['0']));
$email = $stat->fetch();
$DatosUser = $conexion->prepare('CALL datos_tutorado(:id)');
$DatosUser->execute(array(':id' => $_SESSION['usuario']['0']));
$DTBUSER = $DatosUser->fetchall();
$DatosUser = null;
?>