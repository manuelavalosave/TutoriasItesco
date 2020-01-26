<?php
session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/post.php';
    include_once '../app/op_tutor_actividad.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}


?>

<div class="container">
   <?php if($_GET['a'] == 1):?>
       <div class="alert alert-success alert-dissmissible fade show" role="alert" style="margin-top:20px">¡Cambios realizados! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
       <?php endif?>
    <div class="row" style="margin-top: 20px;margin-bottom: 30px;">
        <div class="col-md-9">
           <a href="T-centro_act.php?g=<?php echo $_GET['g']; ?>" class="btn btn-sm btn-outline-primary" style="margin-bottom:10px;">Regresar</a>
            <div class="card" style="margin-bottom:20px; max-height: 600px; border-color: #3498db">
                <div class="card-header h3 text-light" style="background-color: #3498db">
                    Actividad: "<?php echo $act['titulo']?>"
                </div>
                <div class="card-body" style="overflow-y: scroll;">
                  <div class="text-right">
                   

                    <a href="../tutor/crear_actividad.php?g=<?php echo $_GET['g']; ?>&id=<?php echo $act['id_actividad']?>" class="btn btn-sm btn-outline-primary">Editar Actividad</a>
                    
                  </div>
                   <p class="h4"><b>Descripción de la actividad:</b></p>
                    <p class="text-justify"><em><?php echo $act['descripcion'] ?></em></p>
                    <hr>
                    <?php if(!empty($act['archivo'])):?>
                    <div>
                       <i class="material-icons">attach_file</i><a href="../docs/actividades/tutores/<?php echo $act['archivo'] ?>" target="_blank"><?php echo $act['archivo']?></a>
                    </div>
                    <hr>
                    <?php endif ?>
                    <div class="row">
                        <div class="col">
                        <div class="alert alert-secondary"><b>Fecha de publicación:</b><br><?php echo strftime("%d de %B, %H:%M %p", strtotime($act['fecha_pub']))?></div>
                        </div>
                        <div class="col">
                        <div class="alert alert-danger"><b>Fecha límite de entrega:</b><br><?php echo strftime("%d de %B, %H:%M %p", strtotime($act['fecha_entrega'])) ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="max-height: 600px; border-color: #3498db; margin-bottom:20px;">
                <div class="card-header h3 text-light" style="background-color: #3498db">Entregados:</div>
                <div class="card-body" style="padding:0;">
                    <table class="table table-responsive table-striped">
                        <?php if(!empty($alumnos)):?>
                        <thead class="text-white" style="background: #2980b9">
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Alumno:</th>
                            <th class="text-center" scope="col">Archivo:</th>
                            <th class="text-center" scope="col">Fecha de subida:</th>
                            <th class="text-center" scope="col">Estado:</th>
                            <th class="text-center" scope="col">Revisión:</th>
                        </thead>
                        <tbody>
                            <?php foreach($alumnos as $alumno): ?>
                            <td class="text-center"><?php echo $i?></td>
                            <td class="text-center text-capitalize"><?php $name = obtener_usuario($alumno['id_usuario'],$conexion); echo $name['nombre'];?></td>
                            <td class="text-center"><a target="_blank" href="../docs/actividades/alumnos/<?php echo $alumno['archivo'] ?>"><span class="material-icons">insert_drive_file</span></a></td>
                            <td class="text-center"><?php echo strftime("%d de %B, %H:%M %p", strtotime($alumno['fecha_subida'])) ?></td>
                            <?php if($alumno['estado'] == '1'): ?>
                            <td class="text-center text-muted">No Revisado</td>
                            <?php elseif($alumno['estado'] == '2'): ?>
                            <td class="text-center text-success">Revisado</td>
                            <?php elseif($alumno['estado'] == '3'): ?>
                            <td class="text-center text-danger">Observaciones</td>
                            <?php endif ?>
                            <td class="text-center">
                            <form name="estado<?php echo $i?>" action="../app/op_tutor_actividad.php?id=<?php echo $_GET['id']; ?>&g=<?php echo $_GET['g']; ?>" method="POST">
                                <input name="Archivo" type="text" value="<?php echo $_GET['id']?>" hidden>
                                 <input name="idArchivo" type="text" value="<?php echo $alumno['id_archivo']?>" hidden>
                                <input name="Aceptado" class="btn btn-sm btn-outline-success" type="submit" value="Revisado">
                                <input name="Observ" class="btn btn-sm btn-outline-danger" type="submit" value="observación">

                            </form>
                            </td>
                            <?php $i++; endforeach ?>
                        </tbody>
                        <?php else: ?>
                        <div class="text-muted h4 text-center" style="margin-top:20px;">Ningún alumno ha entregado aún...</div>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>