<?php

include_once 'conexion.php';



$conexion = conexion($db_config);



if (isset($_POST['enviar'])) {
   
  
    $alumno = $_POST['alumno'];
    
    $fecha = $_POST['fecha'];
//echo $fecha; echo $_POST['hora']; 
echo $alumno;
    $asesoria = $conexion->prepare("INSERT INTO entrevistas(fecha, id_Lugar, id_alumno, id_grupo) VALUES (:f, :L, :A, :G)"); 
    $asesoria->execute(array(":f" => $fecha, ':L' => $_POST['hora'], ":A" => $alumno,':G' => $_POST['Grupo_id']));

    header('Location: ../alumno/asesorias.php?a=1');
}




?>