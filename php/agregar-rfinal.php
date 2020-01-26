<?php 

	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id'];
	$n=$_POST['nombre'];
	$a=$_POST['materia_adeuda'];
	$e=$_POST['resultados_finalizar_semestre'];
	



	$sql="INSERT into estudiantes_irregulares (nombre,materia_adeuda,resultados_finalizar_semestre)
								values ($n,'$a','$e')";
	
//print_r($sql);
								
	
$rp2 = $conexion->prepare($sql);
$rp2->execute();
$reporte_parcial2 = $rp2->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
              /* $stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
   
 ?>