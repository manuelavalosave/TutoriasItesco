<?php session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/post.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}
$conexion = conexion($db_config);

$grupo = $_GET['g'];
$act = $conexion->prepare("SELECT * FROM actividades WHERE id_grupo = $grupo");
$act->execute();
$actividades = $act->fetchAll();

$i = 1;

?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <?php if($_GET['a'] == 1): ?>
           <div class="alert alert-success alert-dissmissible fade show" role="alert">¡La actividad se ha creado exitosamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
           <?php endif ?>
            <div class="card border-primary" style="max-height: 600px">
                <div class="card-header h3 text-light" style="background-color: #3498db">Centro de Actividades</div>
                <div class="card-body" style="overflow-y: scroll; padding: 0;">
                    <table class="table table-striped">
                        <thead class="text-white" style="background-color: #2980b9">
                        <th scope="col">#</th>
                        <th scope="col">Nombre de la actividad</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">fecha de entrega</th>
                        <th></th>
                        </thead>
                        <tbody>
                            <?php if(empty($actividades)): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="5">Aun no hay actividades</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($actividades as $actividad): ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $actividad['titulo']?></td>
                                    <td>Activa</td>
                                    <td><?php echo strftime("%d de %b, %H:%M %p", strtotime($actividad['fecha_entrega']))?></td>
                                    <td>
                                       <a href="../tutor/actividad.php?g=<?php echo $_GET['g']; ?>&id=<?php echo $actividad['id_actividad']?>" class="btn btn-block btn-sm btn-outline-primary">Ver</a>
                                           
                                       
                                    </td>
                                </tr>
                                <?php $i++; endforeach ?>
                            <?php endif?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right card-footer" style="padding: 10px 10px;">
                    <a href="crear_actividad.php?g=<?php echo $_GET['g']; ?>" class="btn btn-outline-danger">Generar Actividad nueva</a>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>

