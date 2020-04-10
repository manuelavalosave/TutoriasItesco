<?php
session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/post.php';
    include_once '../app/op_tutor_asesorias.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}
?>

<div class="container">
   <?php if ($_GET['a'] == 1): ?>
            <div class="alert alert-success" style="margin-top:20px">¡Asesoría creada!</div>
        <?php elseif($_GET['a'] == 2):?>
            <div class="alert alert-danger" style="margin-top:20px">¡Asesoría eliminada!</div>
        <?php endif ?>
          <?php if ($_GET['b'] == 1): ?>
            <div class="alert alert-success" style="margin-top:20px">¡Horario Creado!</div>
        <?php elseif($_GET['b'] == 2):?>
            <div class="alert alert-danger" style="margin-top:20px">¡Horario eliminado!</div>
        <?php endif ?>
    <div class="row" style="margin-top: 20px;margin-bottom: 30px;">
        <div class="col-md-9">
            <p>
                <a class="btn btn-sm btn-danger" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Añadir Nuevo Horario de entrevista</a>
            </p>
            <div class="collapse" id="formatos">
                <div class="card" style="margin-bottom:20px ;border-color: #3498db">
                <div class="card-header h3 text-white" style="background-color: #3498db">Horario de entrevista</div>
                <div class="card-body">
                    <form action="../app/op_tutor_asesorias_hora.php?g=<?php echo $_GET['g'];?>" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon">Dia:</span>
                             <select class="custom-select text text-capitalize" name="Dia" required>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                             </select>
                            
                        </div>
                                                <p></p>
                        <div class="input-group">
                            <span class="input-group-addon">Hora:</span>
                         <input type="time" name="Horario">
                        </div>


                    
                        <p></p>
                        <div class="input-group">
                            <span class="input-group-addon">Lugar</span>
                            <textarea class="form-control" name="Lugar" rows="4" required></textarea>
                        </div>
                    <p></p>
                        <input type="submit" name="enviar" class="btn btn-info" value="Enviar">
                    </form>
                </div>
            </div>
            </div>
                
            <div class="card" style="margin-bottom:20px;border-color: #9b59b6;">

 <div class="card-header text-light" style="background-color: #9b59b6"><span class="h3">Horarios</span></div>
                <div class="card-body" style="overflow-y: scroll; height: 320px;">
                    <div class="h3 text-viol">Tus horarios:</div>
                    <hr>

                    
                    <?php if (empty($Horarios)): ?>
                        <p class="text-muted">No tienes Horarios asignados...</p>
                    <?php endif ?>
                    
                    <?php foreach ($Horarios as $h): ?>
                    <div class="card card-body" style="background-color:#fafafa">
                        <div class="row">
                            <div class="col-10"><b class="h3 text-viol2">"<?php echo $h['Dia']?>"</b></div>
                            <div class="col text-right">
                                <form name="e-asesoria<?php echo $i?>" action="../app/op_tutor_asesorias_hora.php" method="post">
                                    <button name="eliminar" class="btn btn-sm btn-outline-danger" type="submit" value="eliminar">Eliminar</button>
                                    <input name="i" type="text" value="<?php echo $h['Id_Horario']?>" hidden>
                                </form>
                            </div>
                        </div>
                        <p></p>
                        <i class="text-muted"><?php echo $h['Hora']?> <?php echo $h['Lugar']?></i>
                        <p></p>
                        <div class="row">
                         
                        </div>
                    </div>
                    <p></p>
                    <?php $i++; endforeach ?>
                </div>

                <div class="card-header text-light" style="background-color: #9b59b6"><span class="h3">Entrevistas</span></div>
                <div class="card-body" style="overflow-y: scroll; height: 320px;">
                    <div class="h3 text-viol">Entrevistas pendientes :</div>
                    <hr>


                    <?php if (empty($resultado)): ?>
                        <p class="text-muted">No tienes entrevistas pendientes...</p>
                    <?php endif ?>
                    
                    <?php 
                    $con = 0;
                    foreach ($resultado as $asesoria): $con = $con+1; ?>
                    <div class="card card-body" style="background-color:#fafafa">
                        <div class="row">
                            <div class="col-10"><b class="h3 text-viol2">"Entrevista <?php echo $con ?>"</b></div>
                            <div class="col text-right">
                                <form name="e-asesoria<?php echo $i?>" action="../app/op_tutor_asesorias.php?g=<?php echo $_GET['g']; ?>" method="post">
                                    <button name="eliminar" class="btn btn-sm btn-outline-danger" type="submit" value="eliminar">Eliminar</button>
                                    <input name="i" type="text" value="<?php echo $asesoria['id_entrevistas']?>" hidden>
                                </form>
                            </div>
                        </div>
                        <p></p>
                        <i class="text-muted"><?php echo $asesoria['descripcion']?></i>
                        <p></p>
                        <div class="row">
                            <div class="col text-left text-capitalize text-muted"><b class="text-viol2">Alumno: </b><?php $user = obtener_usuario($asesoria['id_alumno'],$conexion); echo $user['nombre'];?></div>
                            <div class="col text-right text-muted"><b class="text-viol2">Fecha de cita: </b><?php echo strftime("%d de %h del %G", strtotime($asesoria['fecha'])) ?></div>
                            <div class="col-3 text-right text-muted"><b class="text-viol2">Hora: </b><?php 
$HorarioSolicitado = $conexion->prepare("SELECT * FROM horario_entrevista WHERE Id_Horario = :id");
$HorarioSolicitado->execute(array(":id" => $asesoria['id_lugar']));
$Lugar = $HorarioSolicitado->fetchAll();
print_r($Lugar[0][2]);
                             ?>   hrs</div>
                        </div>
                    </div>
                    <p></p>
                    <?php $i++; endforeach ?>
                </div>
            </div>
            
        </div>

        <?php include_once '../plantillas/T-menu.inc.php'; ?>

    </div>
    <br>
    <div class="row" style="padding-bottom: 30px;">
        <div class="col-md-9">
            
        </div>
    </div>

</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>