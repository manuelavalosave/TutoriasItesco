<?php

include_once 'conexion.php';

$i=0;

$conexion = conexion($db_config);


if (isset($_POST['enviar'])) {

    $asesoria = $conexion->prepare("INSERT INTO `horario_entrevista`(`Dia`, `Hora`, `Lugar`, `id_grupos`)VALUES (:dias, :horas, :lugar, :id_G)"); 
    $asesoria->execute(array(":dias"=> $_POST['Dia'], ":horas" => $_POST['Horario'], ":lugar" => $_POST['Lugar'], ":id_G" => $_GET['g'] ));
 
   header('Location: ../tutor/asesorias.php?b=1&g='.$_GET['g'].'');
}
if(isset($_POST['eliminar'])){
    $stat = $conexion->prepare("DELETE FROM horario_entrevista WHERE Id_Horario = :id");
    $stat->execute(array(':id' => $_POST['i']));
    header('Location: ../tutor/asesorias.php?b=2');
}

?>