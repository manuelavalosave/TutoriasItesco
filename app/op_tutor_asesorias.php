<?php

include_once 'conexion.php';

$i=0;

$conexion = conexion($db_config);

$statement = $conexion->prepare("SELECT * FROM asesorias WHERE tutor = :id ORDER BY fecha DESC");
$statement->execute(array(":id" => $_SESSION['usuario']['0']));
$resultado = $statement->fetchAll();

$statement2 = $conexion->prepare("SELECT id, nombre, tipo FROM usuarios WHERE id <> :id AND tipo = 3 AND grupo = :grupo");
$statement2->execute(array(":id" => $_SESSION['usuario']['0'], ":grupo" => $_SESSION['usuario']['4']));
$usuarios = $statement2->fetchAll();
  dkdslfk

if (isset($_POST['enviar'])) {
    $titulo = trim(stripslashes(htmlspecialchars($_POST['titulo'])));
    $tutor = $_POST['tutor'];
    $alumno = $_POST['alumno'];
    $contenido = trim(stripslashes(htmlspecialchars($_POST['contenido'])));
    $fecha = $_POST['fecha'];

    $asesoria = $conexion->prepare("INSERT INTO asesorias (id, tutor, alumno, titulo, descripcion, fecha, hora) VALUES (NULL, :tutor, :alumno, :titulo, :descripcion, :fecha, :hora)"); 
    $asesoria->execute(array(":tutor" => $tutor, ":alumno" => $alumno, ":titulo" => $titulo, ":descripcion" => $contenido, ":fecha" => $fecha, ':hora' => $_POST['hora']));

    header('Location: ../tutor/asesorias.php?a=1');
}
if(isset($_POST['eliminar'])){
    $stat = $conexion->prepare("DELETE FROM asesorias WHERE id = :id");
    $stat->execute(array(':id' => $_POST['i']));
    header('Location: ../tutor/asesorias.php?a=2');
}


$BuscarH = $conexion->prepare("SELECT * FROM horario_entrevista  ORDER BY Id_Horario DESC");
$BuscarH->execute();
$Horarios = $BuscarH->fetchAll();
?>