<?php
include_once 'conexion.php';
session_start();
$conexion = conexion($db_config);
$grupo = $_GET['g'];
if (isset($_POST['enviar'])) {
    $statement = $conexion->prepare("INSERT into mensajes (id_mensaje,emisor,receptor,titulo,mensaje,fecha,fk_grupop) VALUES (NULL, :emisor, :receptor, :titulo, :mensaje, NULL, :g)");
    $statement->execute(array(":emisor" => $_POST['emisor'], ":receptor" => $_POST['receptor'], ":titulo" => $_POST['titulo'], ":mensaje" => $_POST['mensaje'], ":g" => $_GET['g']));
    

    header("Location: ../tutor/T-buzon.php?a=1&g=".$_GET['g']."");
}


$obt = $conexion->prepare("SELECT * FROM grupo_periodos WHERE id_gp = $grupo");
$obt->execute();
$group = $obt->fetch();
$statement = $conexion->prepare("SELECT id, nombre, tipo FROM usuarios WHERE id <> :id AND grupo = :grupo OR tipo= 1  ORDER BY `usuarios`.`nombre` ASC");
$statement->execute(array(":id" => $_SESSION['usuario']['0'], ':grupo'=> $group['fk_Grupo']));
$usuarios = $statement->fetchall();
?>