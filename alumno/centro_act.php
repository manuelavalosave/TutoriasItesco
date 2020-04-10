<?php
session_start();
if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
    include_once '../app/conexion.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}
$i=1;
$conexion = conexion($db_config);
$grupo = $_SESSION['usuario']['4'];
$obt = $conexion->prepare("SELECT * FROM grupo_periodos WHERE fk_Grupo = $grupo");
$obt->execute();
$group = $obt->fetch();


$stat = $conexion->prepare('SELECT id_actividad,titulo,fecha_entrega FROM actividades WHERE id_grupo = :grupo and MostrarAlumno=1');
$stat->execute(array(':grupo' => $group['id_gp']));
$actividades = $stat->fetchAll();
?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div class="card border-primary" style="max-height: 600px">
                <div class="card-header h3 text-light" style="background-color: #3498db">
                    Centro de Actividades
                </div>
                <div class="card-body" style="padding:0; overflow-y: scroll;">
                    <table class="table table-striped text-center">
                        <thead class="text-white" style="background-color: #2980b9">
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Actividad</th>
                        <th class="text-center" scope="col">Estatus</th>
                        <th class="text-center" scope="col">fecha de entrega</th>
                        <th class="text-center"></th>
                        </thead>
                        <tbody>
                            <?php if(empty($actividades)): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="5">Aun no se encuentran actividades</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($actividades as $actividad): ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>"<?php echo $actividad['titulo']?>"</td>
                                    <td class="text-success"><b>Activa</b></td>
                                    <td class="text-danger"><?php echo strftime("%d de %b, %H:%M %p", strtotime($actividad['fecha_entrega']))?></td>
                                    <td class="h6"><a class="badge badge-info" href="actividad.php?id=<?php echo $actividad['id_actividad']?>">Ver más</a></td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/A-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>

