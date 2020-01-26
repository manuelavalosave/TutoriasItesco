<?php
session_start();
include_once 'conexion.php';
setlocale(LC_ALL, "es");

$conexion = conexion($db_config);

if(!empty($_POST['subir'])){
    if(!empty($_FILES['archivo']['name'])){
        $check = @filesize($_FILES['archivo']['tmp_name']);
        if($check !== false){
            $carpeta_destino = '../docs/actividades/alumnos/';
            $archivo_subido = $carpeta_destino . $_FILES['archivo']['name'];
            move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_subido);
            
            $stat = $conexion->prepare("INSERT INTO entrega_actividades (id_actividad, id_archivo, id_usuario, archivo, fecha_subida,estado) VALUES (:id_act, NULL, :id_usuario, :archivo, NULL, 1)");
            $stat->execute(array(":id_act" => $_POST['id'], ":id_usuario" => $_SESSION['usuario']['0'], ":archivo" => $_FILES['archivo']['name']));
            header("Location:../alumno/actividad.php?id=".$_GET['id']."&a=1");
        }
    }
}

if(!empty($_POST['delete'])){
    $del = $conexion->prepare("DELETE FROM entrega_actividades WHERE archivo = :archivo");
    $del->execute(array(":archivo" => $_POST['archivo']));
    $name = $_POST['archivo'];
    unlink("../docs/actividades/alumnos/$name");
    header('Location:../alumno/actividad.php?id='.$_GET['id'].'&a=2');
}

$stat = $conexion->prepare('SELECT * FROM actividades WHERE id_actividad = :id');
$stat->execute(array(':id' => $_GET['id']));
$act = $stat->fetch();

$stat2 = $conexion->prepare("SELECT archivo, estado FROM entrega_actividades WHERE id_usuario = :id_usuario AND id_actividad = :id_actividad");
$stat2->execute(array(":id_usuario" => $_SESSION['usuario']['0'], ":id_actividad" => $_GET['id']));
$file = $stat2->fetch();
?>