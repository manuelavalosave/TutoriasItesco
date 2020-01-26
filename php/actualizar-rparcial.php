<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id_reporte'];
	$n=$_POST['numero'];
	$a=$_POST['fecha_programada'];
	$e=$_POST['actividad_realizada'];
	$t=$_POST['objetivo_logrado'];
	$s=$_POST['problematica_presentada'];
	$h=$_POST['observaciones'];


               $sql="UPDATE reporte_parcial set numero=$n,
								fecha_programada='$a',
								actividad_realizada='$e',
								objetivo_logrado='$t',
								problematica_presentada='$s',
								observaciones='$h'
								where id_reporte=$id";
echo $sql;
								

$actualizar = $conexion->prepare($sql);
$actualizar->execute();		


				
	/*echo $result=mysqli_query($conexion,$sql);
$stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
 ?>
 
