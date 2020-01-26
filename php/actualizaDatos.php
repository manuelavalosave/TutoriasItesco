<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id_plan'];
	$n=$_POST['numero'];
	$a=$_POST['fecha_programada'];
	$e=$_POST['actividad_realizar'];
	$t=$_POST['objetivo_realizar'];
	$s=$_POST['material_utilizar'];
	$h=$_POST['observaciones'];


               $sql="UPDATE plan_trabajos set numero=$n,
								fecha_programada='$a',
								actividad_realizar='$e',
								objetivo_realizar='$t',
								material_utilizar='$s',
								observaciones='$h'
								where id_plan=$id";
echo $sql;								

$actualizar = $conexion->prepare($sql);
$actualizar->execute();		


				
	/*echo $result=mysqli_query($conexion,$sql);
$stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
 ?>
 