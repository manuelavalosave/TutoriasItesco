<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id_reporte'];
	$n=$_POST['nombre'];
	$a=$_POST['materia_adeuda'];
	$e=$_POST['resultados'];
	


               $sql="UPDATE reporte_parcial set nombre=$n,
								materia_adeuda='$a',
								resultados='$e'
								
								where id_estudiantei=$id";
echo $sql;
								

$actualizar = $conexion->prepare($sql);
$actualizar->execute();		


				
	/*echo $result=mysqli_query($conexion,$sql);
$stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
 ?>