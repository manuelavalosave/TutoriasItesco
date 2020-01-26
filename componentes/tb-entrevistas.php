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
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
		
			<tr>
				<td>Fecha</td>
				<td >No. CTRL</td>
				<td>Nombre del alumno</td>
				<td>Asignatura</td>
				<td>Problmática</td>
				<td>Recomendaciones</td>
				<td>Crónica-Degenerativa</td>
				<td>Metabólica</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
	
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$ide=$_SESSION['consulta'];
						$sql="SELECT id_entrevista,fecha,numero_control,nombre_alumno,problematica,recomendaciones,cronica_degenerativa,metabolica
						from entrevistas where id='$id_entrevista'";
					}else{
						$sql="SELECT id_entrevista,fecha,numero_control,nombre_alumno,problematica,recomendaciones,cronica_degenerativa,metabolica 
						from entrevistas";
					}
				}else{
					$sql="SELECT id_entrevista,fecha,numero_control,nombre_alumno,problematica,recomendaciones,cronica_degenerativa,metabolica
						from entrevistas";
				}

$ent = $conexion->prepare($sql);
$ent->execute();
$entrevistas1 = $ent->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
                 foreach ($entrevistas1 as $ey2 ) {
                 	//print_r($ey1);
                 	//$datos = $ey1; 

                 	$datos=$ey2[0]."||".
						   $ey2[1]."||".
						   $ey2[2]."||".
						   $ey2[3]."||".
						   $ey2[4]."||".
						   $ey2[5]."||".
						   $ey2[6]."||".
						   $ey2[7]."||".
						   $ey2[8];
                 
				//$result=mysqli_query($conexion,$sql);

				//while($ver=mysqli_fetch_row($result)){ 

					
			 ?>

			<tr>
				<td><?php echo $ey2[1] ?></td>
				<td><?php echo $ey2[2] ?></td>
				<td><?php echo $ey2[3] ?></td>
				<td><?php echo $ey2[4] ?></td>
				<td><?php echo $ey2[5] ?></td>
				<td><?php echo $ey2[6] ?></td>
				<td><?php echo $ey2[7] ?></td>
				<td><?php echo $ey2[8] ?></td>
				<td>

					<button class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformE('<?php echo $datos ?>')">
						
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