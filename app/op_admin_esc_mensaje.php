<?php
include_once 'conexion.php';
session_start();
$conexion = conexion($db_config);

if (isset($_POST['enviar'])) {
    $statement = $conexion->prepare("INSERT into mensajes (id_mensaje,emisor,receptor,titulo,mensaje,fecha,fk_grupop) VALUES (NULL, :emisor, :receptor, :titulo, :mensaje, NULL, :g)");
    $statement->execute(array(":emisor" => $_POST['emisor'], ":receptor" => $_POST['receptor'], ":titulo" => $_POST['titulo'], ":mensaje" => $_POST['mensaje'], ":g" => 8));
    header("Location: ../admin/Ad-buzon.php?a=1");
}

$statement = $conexion->prepare("SELECT id, nombre, tipo FROM usuarios WHERE id <> :id AND tipo = 2");
$statement->execute(array(":id" => $_SESSION['usuario']['0']));
$usuarios = $statement->fetchAll();
?>