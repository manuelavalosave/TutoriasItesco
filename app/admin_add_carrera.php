<?php
include_once 'conexion.php';
session_start();
$conexion = conexion($db_config);

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

$stat = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
$stat->execute(array(":id" => $id));
$edit = $stat->fetch();

if(!empty($_POST['editar'])){
    $grupo = htmlspecialchars($_POST['e-grupo']);
    $semestre = htmlspecialchars($_POST['e-semestre']);
    $carrera = htmlspecialchars($_POST['e-carrera']);
    
    $stat = $conexion->prepare("SELECT id_grupo FROM grupo WHERE grupo = :grupo AND semestre = :semestre AND carrera = :carrera");
    $stat->execute(array(":grupo" => $grupo, ":semestre" => $semestre, ":carrera" => $carrera));
    $group = $stat->fetch();
    
    $stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));
    
    $stat3 = $conexion->prepare("UPDATE detalle_usuarios SET carrera = :carrera, semestre = :semestre, grupo = :grupo WHERE id_usuario = :id");
    $stat3->execute(array(":grupo" => $grupo, ":semestre" => $semestre, ":carrera" => $carrera, ":id" => $_POST['id']));
    header("location: ../admin/usuarios.php?a=1");
}
?>