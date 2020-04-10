<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once 'conexion.php';

$i=0;

$conexion = conexion($db_config);

$statement = $conexion->prepare("SELECT * FROM entrevistas WHERE id_grupo = :id ORDER BY fecha DESC");
$statement->execute(array(":id" => $_GET['g']));
$resultado = $statement->fetchAll();

$statement2 = $conexion->prepare("SELECT id, nombre, tipo FROM usuarios WHERE id <> :id AND tipo = 3 AND grupo = :grupo");
$statement2->execute(array(":id" => $_SESSION['usuario']['0'], ":grupo" => $_SESSION['usuario']['4']));
$usuarios = $statement2->fetchAll();
  

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
    $stat = $conexion->prepare("DELETE FROM entrevistas WHERE id_entrevistas = :id");
    $stat->execute(array(':id' => $_POST['i']));
    header('Location: ../tutor/asesorias.php?a=2&g='.$_GET['g'].'');
}


$BuscarH = $conexion->prepare("SELECT * FROM horario_entrevista WHERE id_grupos = :id  ORDER BY Id_Horario DESC");
$BuscarH->execute(array(':id' => $_GET['g'] ));
$Horarios = $BuscarH->fetchAll();
?>