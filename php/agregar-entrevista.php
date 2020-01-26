<?php 

	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id'];
	$a=$_POST['fecha'];
	$b=$_POST['numero_control'];
	$c=$_POST['nombre_alumno'];
	$d=$_POST['asignatura'];
	$e=$_POST['problematica'];
	$f=$_POST['recomendaciones'];
	$g=$_POST['cronica_degenerativa'];
	$h=$_POST['metabolica'];



	$sql="INSERT into entrevistas (fecha,numero_control,nombre_alumno,asignatura,problematica,recomendaciones,cronica_degenerativa,metabolica)
								values ('$a','$b','$c','$d','$e','$f','$g','$h')";

								/*$sql= "INSERT INTO entrevistas (fecha, numero_control, nombre_alumno, asignatura, problematica, recomendaciones, cronica_degenerativa, metabolica) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h')";*/
print_r($sql);
	
$ent2 = $conexion->prepare($sql);
$ent2->execute();
$entravista2 = $ent2->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
              /* $stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
   
 ?>