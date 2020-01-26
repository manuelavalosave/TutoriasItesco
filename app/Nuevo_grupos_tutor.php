<?php session_start();
require 'conexion.php';



		$errores = '';
	if ( isset($_POST['Guardar'])) {
		
		$id_user_log = $_POST['id_trabajador'];
		$carrera = $_POST['carrera'];
		$semestre = $_POST['semestre'];
        $grupo = $_POST['grupo'];
        $periodo = $_POST['periodos'];
			$conexion = conexion($db_config);
			if ($errores == '') {
   $stat = $conexion->prepare("SELECT id_grupo FROM grupo WHERE grupo = :grupo AND semestre = :semestre AND carrera = :carrera");
    $stat->execute(array(":grupo" => $grupo, ":semestre" => $semestre, ":carrera" => $carrera));
    $group = $stat->fetch();
    $id_G = $group['id_grupo'];
				
				$add_user = $conexion->prepare("INSERT INTO `grupo_periodos`(`fk_Grupo`, `fk_Periodo`,`FK_usuario`) VALUES (:fk_Grupo,:fk_Periodo,:FK_usuario)");
    $add_user->execute(array(":fk_Grupo" => $id_G, ":fk_Periodo" => $periodo, ":FK_usuario"=> $id_user_log));

		header('Location:../tutor/index.php?a=1');
			}
		}
	




?>