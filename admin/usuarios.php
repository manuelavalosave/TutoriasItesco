<?php
session_start();
if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/post.php';
    require_once '../app/conexion.php';
    include_once '../app/op_admin_usuarios.php';
  
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}
$i = 1;
$j = 1;

?>
<div class="container">
   <?php if($_GET['a'] == 1): ?>
   <div class="alert alert-success" style="margin-top:20px;">¡El usuario se ha editado correctamente!</div>
   <?php elseif($_GET['a'] ==2 ):?>
   <div class="alert alert-success" style="margin-top:20px;">¡El usuario se ha eliminado correctamente!</div>
   <?php endif ?>
   <?php if(!empty($error)): ?>
   <div class="alert alert-danger" style="margin-top:20px;"><?php echo $error?></div>
   <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div class="h2">Usuarios</div>
            <div class="card" style="border-color: #34495e; margin-bottom: 20px;; max-height: 300px;">
                <div class="card-header h3 text-white" style="background-color: #34495e">Tutores</div>
                <div class="card-body" style="padding:0;  overflow-y:scroll;">
<!--                <table id="admin_usuarios" class="table text-center table-responsive table-striped">-->
                <table class="table text-center table-responsive table-striped">
                    <thead class="text-white" style="background: #2c3e50">
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Docente</th>
                        <th class="text-center" scope="col">RFC</th>
                        <th class="text-center" scope="col">Grupo</th>
                        <th class="text-center" scope="col">Semestre</th>
                        <th class="text-center" scope="col">Carrera</th>
                        <th class="text-center" scope="col">Options</th>
                    </thead>
                    <tbody>
                        <?php foreach($tutores as $tutor): ?>
                        <?php
                        $grupo = $tutor['grupo'];
                        $stat2 = $conexion->prepare("SELECT * FROM grupo WHERE id_grupo = $grupo ");
                        $stat2->execute();
                        $group = $stat2->fetch();
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td class="text-capitalize"><?php echo $tutor['nombre']?> <?php echo $tutor['a_paterno']?> <?php echo $tutor['a_materno']?></td>
                            <td><?php echo $tutor['no_control']?></td>
                            <td><?php echo $group['grupo']?></td>
                            <td><?php echo $group['semestre']?></td>
                            <td><?php echo $group['carrera']?></td>
                            <td>
                                <a href="editar_usuario.php?id=<?php echo $tutor['id']?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#borrar-tutor<?php echo $i?>">Eliminar</button>
                          
                                <div class="modal fade" id="borrar-tutor<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="borrar-tutor<?php echo $i?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger text-white">
                                        <h4 class="modal-title text-center" id="borrar-tutor<?php echo $i?>">¿Está seguro que desea eliminar a este usuario?</h4>
                                      </div>
                                      <div class="modal-body h6 text-secondary text-center">
                                        <p>Se eliminará al usuario <strong class="text-rojo text-capitalize">"<?php echo $tutor['nombre']?>"</strong> de la plataforma.</p>
                                        Esta acción no se puede recuperar...
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                        <form name="e-tutor<?php echo $i?>" action="<?php echo htmlspecialchars('../app/op_admin_usuarios.php')?>" method="post">
                                            <input class="btn btn-outline-danger btn-sm" name="borrar" type="submit" value="Eliminar">
                                            <input name="id" type="text" value="<?php echo $tutor['id']?>" hidden>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card" style="border-color: #34495e; margin-bottom: 20px;; max-height: 300px;">
                <div class="card-header h3 text-white" style="background-color: #34495e">Alumnos</div>
                <div class="card-body" style="padding:0;  overflow-y:scroll;">
                <table class="text-center table table-responsive table-striped">
                    <thead class="text-white" style="background: #2c3e50">
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre</th>
                        <th class="text-center" scope="col">No. Control</th>
                        <th class="text-center" scope="col">Grupo</th>
                        <th class="text-center" scope="col">Semestre</th>
                        <th class="text-center" scope="col">Carrera</th>
                        <th class="text-center" scope="col"></th>
                    </thead>
                    <tbody>
                        <?php foreach($alumnos as $alumno): ?>
                        <?php
                        $grupo = $alumno['grupo'];
                        $stat2 = $conexion->prepare("SELECT * FROM grupo WHERE id_grupo = $grupo ");
                        $stat2->execute();
                        $group = $stat2->fetch();
                        ?>
                        <tr>
                            <td><?php echo $j?></td>
                            <td class="text-capitalize"><?php echo $alumno['nombre']?> <?php echo $alumno['a_paterno']?> <?php echo $alumno['a_materno']?></td>
                            <td><?php echo $alumno['no_control']?></td>
                            <td><?php echo $group['grupo']?></td>
                            <td><?php echo $group['semestre']?></td>
                            <td><?php echo $group['carrera']?></td>
                            <td>
                                <a href="editar_usuario.php?id=<?php echo $alumno['id']?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#borrar-alumno<?php echo $j?>">Eliminar</button>
                          
                                <div class="modal fade" id="borrar-alumno<?php echo $j?>" tabindex="-1" role="dialog" aria-labelledby="borrar-alumno<?php echo $j?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger text-white">
                                        <h4 class="modal-title" id="borrar-alumno<?php echo $j?>">¿Está seguro que desea eliminar a este usuario?</h4>
                                      </div>
                                      <div class="modal-body h6 text-secondary text-center">
                                        <p>Se eliminará al usuario <strong class="text-rojo text-capitalize">"<?php echo $alumno['nombre']?>"</strong> de la plataforma.</p>
                                        Esta acción no se puede recuperar...
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                        <form name="e-alumno<?php echo $j?>" action="<?php echo htmlspecialchars('../app/op_admin_usuarios.php')?>" method="post">
                                            <input class="btn btn-outline-danger btn-sm" name="borrar" type="submit" value="Eliminar">
                                            <input name="id" type="text" value="<?php echo $alumno['id']?>" hidden>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        <?php $j++; endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>