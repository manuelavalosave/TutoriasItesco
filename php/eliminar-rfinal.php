<?php 
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id'];

	$sql="DELETE from reporte_parcial where id_reporte=$id";
	//echo $result=mysqli_query($conexion,$sql);
echo $sql;
	$eliminar = $conexion->prepare($sql);
$eliminar->execute();

 ?>