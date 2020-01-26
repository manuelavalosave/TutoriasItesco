
<?php 
	
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
				<td>N°</td>
				<td >Fecha de entrega</td>
				<td>Actividad a realizar</td>
				<td>Objetivo de la actividad</td>
				<td>Material a utilizar</td>
				<td>Obervaciones</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
	
			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id_plan,numero,fecha_programada,actividad_realizar,objetivo_realizar,material_utilizar,observaciones 
						from plan_trabajos where id='$id_plan'";
					}else{
						$sql="SELECT id_plan,numero,fecha_programada,actividad_realizar,objetivo_realizar,material_utilizar,observaciones 
						from plan_trabajos";
					}
				}else{
					$sql="SELECT id_plan,numero,fecha_programada,actividad_realizar,objetivo_realizar,material_utilizar,observaciones 
						from plan_trabajos";
				}

$pdd = $conexion->prepare($sql);
$pdd->execute();
$plan_trabajos1 = $pdd->fetchAll();
				//$result=mysqli_query($conexion,$sql);
				
				//while($plan_trabajos=mysqli_fetch_row($result)){ 
                 foreach ($plan_trabajos1 as $ey1 ) {
                 	//print_r($ey1);
                 	//$datos = $ey1; 

                 	$datos=$ey1[0]."||".
						   $ey1[1]."||".
						   $ey1[2]."||".
						   $ey1[3]."||".
						   $ey1[4]."||".
						   $ey1[5]."||".
						   $ey1[6];
                 
				//$result=mysqli_query($conexion,$sql);

				//while($ver=mysqli_fetch_row($result)){ 

					
			 ?>

			<tr>
				<td><?php echo $ey1[1] ?></td>
				<td><?php echo $ey1[2] ?></td>
				<td><?php echo $ey1[3] ?></td>
				<td><?php echo $ey1[4] ?></td>
				<td><?php echo $ey1[5] ?></td>
				<td><?php echo $ey1[6] ?></td>
				<td>

					<button class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
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