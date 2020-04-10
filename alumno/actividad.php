<?php
session_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
if ($_SESSION['usuario']['3'] == '3') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar.inc.php';
    include_once '../app/conexion.php';
    include_once '../app/op_alumno_actividad.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>

<div class="container">
   <?php if($_GET['a'] == 1): ?>
       <div class="alert alert-success alert-dissmissible fade show" role="alert">¡Archivo subido correctamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php elseif($_GET['a'] == 2):?>
        <div class="alert alert-danger alert-dissmissible fade show" role="alert">¡Archivo eliminado correctamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <a href="centro_act.php" class="btn btn-sm btn-outline-primary" style="margin-bottom:10px;">Regresar</a>
            <div class="card border-primary" style="max-height: 600px">
                <div class="card-header h3 text-light" style="background-color: #3498db">
                    Actividad: "<?php echo $act['titulo']?>"
                </div>
                <div class="card-body" style="overflow-y: scroll;">
                   <p class="h4"><b>Descripción de la actividad:</b></p>
                    <p class="text-justify"><em><?php echo $act['descripcion'] ?></em></p>
                    <hr>
                    <?php if(!empty($act['archivo'])):?>
                    <div>
                       <a target="_blank" href="../docs/actividades/tutores/<?php echo $act['archivo']?>"><i class="material-icons">attach_file</i><?php echo $act['archivo']?></a>
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
                    <?php if(!empty($file)): ?>
                    <table class="table table-striped">
                        <thead class="text-white" style="background-color: #3498db">
                            <th class="text-center" scope="col">Archivo Subido</th>
                            <th class="text-center" scope="col">Estado</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="../docs/actividades/alumnos/<?php echo $file['archivo']?>" target="_blank"><span class="material-icons">insert_drive_file</span> <?php echo $file['archivo']?></a></td>
                                <?php if($file['estado'] == '1'): ?>
                                <td class="text-center h5 text-muted"><span class="badge badge-secondary">Pendiente</span></td>
                                <?php elseif($file['estado'] == '2'): ?>
                                <td class="text-center h5 text-success"><span class="badge badge-success">Revisado</span></td>
                                <?php elseif($file['estado'] == '3'): ?>
                                <td class="text-center h5">
                                <h5 class="badge badge-danger">Observaciones</h5>
                                <form name="delete-file" action="../app/op_alumno_actividad.php?id=<?php echo $_GET['id']?>" method="post">
                                    <input name="delete" type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar">
                                    <input name="archivo" type="text" hidden value="<?php echo $file['archivo'] ?>">
                                </form>
                                </td>
                                <?php endif ?>
                            </tr>
                        </tbody>
                    </table>
                    
                    <?php else: ?>
                    <div class="text-muted">Subir archivo:</div>
                    <form name="tarea" enctype="multipart/form-data" action="../app/op_alumno_actividad.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="input-group">
                            <input style="width:80%" name="archivo" type="file" class="form-control" accept=".pdf,.docx">
                            <input name="subir" type="submit" class="btn btn-outline-primary form-control" value="Subir">
                        </div>
                        <input name="id" type="text" value="<?php echo $_GET['id']?>" hidden>
                    </form>
                    <label class="text-danger" for="archivo" style="font-size:10px">*Formatos aceptados: .pdf, .docx.</label>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/A-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>