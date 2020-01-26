<?php
include_once '../app/conexion.php';
$conexion = conexion($db_config);

if(!empty($_POST['Aceptado'])){
    $edit = $conexion->prepare('UPDATE entrega_actividades SET estado = 2 WHERE id_archivo = :id');
    $edit->execute(array(':id' => $_POST['idArchivo']));
    header('Location:../tutor/actividad.php?id='.$_POST['Archivo'].'&a=1&g='.$_GET['g'].'');
}
if(!empty($_POST['Observ'])){
    $edit = $conexion->prepare('UPDATE entrega_actividades SET estado = 3 WHERE id_archivo = :id');
    $edit->execute(array(':id' => $_POST['idArchivo']));
   
    header('Location:../tutor/actividad.php?id='.$_POST['Archivo'].'&a=1&g='.$_GET['g'].'');
}

$i=1;

$stat = $conexion->prepare('SELECT * FROM actividades WHERE id_actividad = :id');
$stat->execute(array(':id' => $_GET['id']));
$act = $stat->fetch();

$stat2 = $conexion->prepare('SELECT id_archivo,id_usuario,archivo,fecha_subida,estado FROM entrega_actividades WHERE id_actividad = :id_actividad');
$stat2->execute(array(':id_actividad' => $_GET['id']));
$alumnos = $stat2->fetchAll();

?>