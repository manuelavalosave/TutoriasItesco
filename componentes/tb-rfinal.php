<?php 
	ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
	require_once "../app/conexion.php";
	$conexion=conexion($db_config);

 ?>
<div class="row">
	<div >
	
	<div class="table-responsive thead-light">
		<table class="table table-bordered">
		 	
		<caption >
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" >
				Agregar nuevo 
				<span class= "glyphicon glyphicon-plus"></span>
			</button>
		</caption>
		
			<tr>
				<td>Nombre</td>
				<td>Materia que adeuda</td>
				<td>Resultados al finalizar el semestre</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
	
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id_estudiantei,nombre,materias_adeuda,resultados_finalizar_semestre 
						from estudiantes_irregulares and usuario where id='$id_estudiantei'";
					}else{
						$sql="SELECT id_estudiantei,nombre,materias_adeuda,resultados_finalizar_semestre
						from estudiantes_irregulares";
					}
				}else{
					$sql="SELECT id_estudiantei,nombre,materias_adeuda,resultados_finalizar_semestre 
						from estudiantes_irregulares";
				}

$rp = $conexion->prepare($sql);
$rp->execute();
$reporte_parcial1 = $rp->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
                 foreach ($reporte_parcial1 as $ey1 ) {
                 	//print_r($ey1);
                 	//$datos = $ey1; 

                 	$datos=$ey1[0]."||".
						   $ey1[1]."||".
						   $ey1[2];
						   
						   
					
			 ?>

			<tr>
				<td><?php echo $ey1[1] ?></td>
				<td><?php echo $ey1[2] ?></td>
				<td><?php echo $ey1[3] ?></td>
				
				<td>

					<button class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformP('<?php echo $datos ?>')">
						
					</button>
				</td>

				<td>
					<button class="btn btn-danger fa fa-remove" 
					onclick="preguntarSiNo('<?php echo $ey1[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
		


       </div>

	</div>

</div>
<br>
  