<?php
include_once 'conexion.php';
session_start();
$conexion = conexion($db_config);
$grupo = $_SESSION['usuario']['4'];
$obt = $conexion->prepare("SELECT * FROM grupo_periodos WHERE fk_Grupo = $grupo");
$obt->execute();
$group = $obt->fetch();
$statement = $conexion->prepare("SELECT id, nombre, tipo FROM usuarios WHERE id = :id ");
$statement->execute(array(":id" =>  $group['FK_usuario']));
$usuarios = $statement->fetchAll();

if (isset($_POST['enviar'])) {
    $statement = $conexion->prepare("INSERT into mensajes (id_mensaje,emisor,receptor,titulo,mensaje,fecha,fk_grupop) VALUES (NULL, :emisor, :receptor, :titulo, :mensaje, NULL,:g)");
    $statement->execute(array(":emisor" => $_POST['emisor'], ":receptor" => $_POST['receptor'], ":titulo" => $_POST['titulo'], ":mensaje" => $_POST['mensaje'], ":g" => $group['id_gp']));
    header("Location: ../alumno/buzon.php?a=1");
}


?>