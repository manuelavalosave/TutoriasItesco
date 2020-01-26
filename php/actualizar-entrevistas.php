<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id_entrevista'];
	$a=$_POST['fecha'];
	$b=$_POST['numero_control'];
	$c=$_POST['nombre_alumno'];
	$d=$_POST['asignatura'];
	$e=$_POST['problematica'];
	$f=$_POST['recomendaciones'];
	$g=$_POST['cronica_degenerativa'];
	$h=$_POST['metabolica'];


               $sql="UPDATE entrevistas set fecha='$a',
								numero_control='$b',
								nombre_alumno='$c',
								asignatura='$d',
								problematica='$e',
								recomendaciones='$f'
								cronica_degenerativa='$g',
								metabolica='$h'
								where id_entrevista=$id";

print_r($sql);								



$entravista3 = $conexion->prepare($sql);
$entravista3->execute();		

				
	/*echo $result=mysqli_query($conexion,$sql);
$stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
 ?>
 