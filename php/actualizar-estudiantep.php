<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id_estudiantep'];
	$n=$_POST['nombre'];
	$a=$_POST['tipo_problema'];
	$e=$_POST['seguimiento'];
	


               $sql="UPDATE estudiantes_problemas set nombre=$n,
								tipo_problema='$a',
								seguimiento='$e'
								
								where id_estudiantesp=$id";
echo $sql;
								

$actualizar = $conexion->prepare($sql);
$actualizar->execute();		


				
	/*echo $result=mysqli_query($conexion,$sql);
$stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
 ?>