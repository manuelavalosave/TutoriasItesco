<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);  session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/post.php';
    require_once '../app/conexion.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}

$conexion = conexion($db_config);
$grupo =  $_GET['g']; 

/* --- Obtener info grupo --- */
$statement = $conexion->prepare("SELECT * FROM grupo_periodos WHERE id_gp = $grupo");
$statement->execute();
$group = $statement->fetch();
/* --- Obtener lista de Alumnos --- */
/*$statement = $conexion->prepare("SELECT * FROM usuarios WHERE grupo = $grupo AND tipo <> 2 AND tipo <> 1 ORDER BY `usuarios`.`nombre` ASC");
$statement->execute();
$lista = $statement->fetchAll();*/
/* --- ------- ----- -- ------- --- */
$stat2 = $conexion->prepare("SELECT * FROM usuarios WHERE grupo = :carrera  AND id != :id ORDER BY nombre ASC");
$stat2->execute(array(':carrera' => $group['fk_Grupo'],  ':id' => $_SESSION['usuario']['0']));
$lista = $stat2->fetchAll();

$datos = $conexion->prepare("CALL datos_grupo(:id)");
$datos->execute(array(":id" =>$group['fk_Grupo']));
$obt_Grupos = $datos->fetch();
$datos->closeCursor();
$i=1;
?>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div id="chat" class="card" style="border-color: #34495e;">
                <div class="card-header h3 text-white" style="background-color: #34495e;">Grupo Asesorado</div>
                <div class="card-body">
                    <div class="card card-body alert-info">
                        <div class="h4">Información de grupo:</div>
                        <div class="row">
                            <div class="col-3">Grupo: <strong><?php echo $obt_Grupos['grupo'] ?></strong></div>
                            <div class="col-3">Semestre: <strong><?php echo $obt_Grupos['semestre'] ?></strong></div>
                            <div class="col-6">Carrera: <strong>Ing. <?php echo $obt_Grupos['carrera'] ?></strong></div>
                        </div>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="bg-info text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Accion</th>
                        </thead>
                        <?php if(empty($lista)):?>
                        <tr>
                            <td colspan="3" class="text-muted text-center">Aun no se han registrado alumnos</td>
                        </tr>
                        <?php endif ?>
                        <tbody>
                                <?php 
                                 foreach ($lista as $a){
                                 
$datosUsuario = $conexion->prepare("CALL informacion_alumno(:id)");
$datosUsuario->execute(array(":id" =>$a[0]));
$DetalleU = $datosUsuario->fetchall();

foreach ($DetalleU as $alumno) {

                                  ?>
                                <tr class="celda">
                                    <th><?php echo $i ?></th>
                                    <td class="text-capitalize" ><?php echo $alumno['nombre']; ?></td>
                                    <td><a style="color:#000" href="#" data-toggle="modal" data-target="#exampleModal<?php echo $i?>"><i class="material-icons">account_circle</i></a> <a style="color:#000" href="escribir_mensaje.php?g=<?php echo $_GET['g']; ?>"><i class="material-icons">local_post_office</i></a> <a style="color:#000" href="#"><i class="material-icons">error</i></a></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content border-info">
                                            <div class="modal-header bg-info text-white">
                                                <h5 class="modal-title" id="exampleModalLabel<?php echo $i?>">Perfil del Alumno </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-capitalize">
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">Nombre:</strong></div>
                                                   <div class="col-7"><?php echo $alumno['nombre']?></div>
                                               </div>
                                             
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">No. Control:</strong></div>
                                                   <div class="col-7"><?php echo $alumno['no_control']?></div>
                                               </div>
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">Fecha de Nacimiento:</strong></div>
                                                   <div class="col-7"><?php echo strftime("%d de %B de %G", strtotime($alumno['fec_nac']));?></div>
                                               </div>
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">Dirección:</strong></div>
                                                   <div class="col-7"><?php echo $alumno['direccion']?></div>
                                               </div>
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">No. Telefónico:</strong></div>
                                                   <div class="col-7"><?php echo $alumno['num_tel']?></div>
                                               </div>
                                               <div class="row">
                                                   <div class="col"><strong class="text-info">Email:</strong></div>
                                                   <div class="col-7"><?php echo $alumno['email']?></div>
                                               </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                                    Aceptar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php $i++; }} ?>
                            </tbody>
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
