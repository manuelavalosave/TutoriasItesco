<?php 

	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id'];
	$n=$_POST['numero'];
	$a=$_POST['fecha_programada'];
	$e=$_POST['actividad_realizar'];
	$t=$_POST['objetivo_realizar'];
	$s=$_POST['material_utilizar'];
	$h=$_POST['observaciones'];


	$sql="INSERT into plan_trabajos (numero,fecha_programada,actividad_realizar,objetivo_realizar,material_utilizar,observaciones)
								values ($n,'$a','$e','$t','$s','$h')";
	

	
$pdd2 = $conexion->prepare($sql);
$pdd2->execute();
$plan_trabajos2 = $pdd2->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
              /* $stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
  
 ?>