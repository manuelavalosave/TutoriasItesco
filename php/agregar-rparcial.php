<?php 

	require_once "../app/conexion.php";
	$conexion=conexion($db_config);
	$id=$_POST['id'];
	$n=$_POST['numero'];
	$a=$_POST['fecha_programada'];
	$e=$_POST['actividad_realizada'];
	$t=$_POST['objetivo_logrado'];
	$s=$_POST['problematica_presentada'];
	$h=$_POST['observaciones'];



	$sql="INSERT into reporte_parcial (numero,fecha_programada,actividad_realizada,objetivo_logrado,problematica_presentada,observaciones)
								values ($n,'$a','$e','$t','$s','$h')";
	
//print_r($sql);
								
	
$rp2 = $conexion->prepare($sql);
$rp2->execute();
$reporte_parcial2 = $rp2->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
              /* $stat2 = $conexion->prepare("UPDATE usuarios SET grupo = :grupo WHERE id = :id");
    $stat2->execute(array(":grupo" => $group['id_grupo'], ":id" => $_POST['id']));*/
   
 ?>