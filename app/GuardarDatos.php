<?php 
session_start();

function Insertar_Formatos_Tutor($nombreA,$grupo){
	require 'conexion.php';

$conexion = conexion($db_config);
$formatos_t_BD = $conexion->prepare("SELECT * FROM formatos_tutor WHERE archivo = :nombre and id_grupo = :grupo");
$formatos_t_BD->execute(array( ":nombre" => $nombreA, ":grupo" => $grupo));
$Formatos = $formatos_t_BD->fetch();
if(empty($Formatos) || $Formatos['archivo'] == "Reporte_Parcial"){

  $stat = $conexion->prepare("INSERT INTO `formatos_tutor`(`autor`, `archivo`,  `estado`,`Id_grupo`) VALUES (:autor,:ruta,0,:grupo)");
    $stat->execute(array(":autor" => $_SESSION['usuario']['0'], ":ruta" => $nombreA, ":grupo" => $grupo));
   
}else{
	 $stat = $conexion->prepare("UPDATE `formatos_tutor` SET `archivo`= :nombre, `Id_grupo`=:grupo WHERE id = :id_b");
    $stat->execute(array(":nombre" => $nombreA, ":grupo" => $grupo, "id_b"=> $Formatos['id']));
 
}

		
	}




?>