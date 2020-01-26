<?php
include_once '../plantillas/doc-declaracion.inc.php';
include_once '../plantillas/navbar_admin.inc.php';
include_once '../app/conexion.php';
include_once '../app/admin_op.php';
include_once '../app/obtener_solicitudes.php';
$i=1;
$t=1;
?>
<div class="container">
    <?php if (!empty($error)): ?>
        <div class="alert alert-info" style="margin-top:20px;"><?php echo $error; ?></div>
    <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <div class="card" style="margin-bottom: 20px; border-color: #e74c3c">
                <div class="card-header text-white h3" style="background: #e74c3c">Solicitudes de Registro: Tutores</div>
                <div class="card-body" style="padding: 0;">
                    <?php if(!empty($tutores)): ?>
                       <table class="table table-responsive table-striped">
                           <thead class="text-white" style="background: #c0392b; font-size:12px;">
                               <th scope="col">Nombre</th>
                               <th scope="col">RFC</th>
                               <th scope="col">Carrera</th>
                               <th scope="col">Email</th>
                               <th scope="col">Acción</th>
                           </thead>
                           <tbody>
                               <?php foreach($tutores as $tutor):?>
                               <form name="tutores<?php echo $t ?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                                   <tr>
                                       <td class="text-capitalize"><?php echo $nombret = $tutor['nombre'].' '.$tutor['a_paterno'].' '.$tutor['a_materno']; ?></td>
                                       <td><?php echo $tutor['no_control']?></td>
                                       <td><?php echo $tutor['division']?></td>
                                       <td><?php echo $tutor['email']?></td>
                                       <td>
                                           <button type="submit" name="aceptar" value="Aceptar" class="btn btn-sm btn-primary">Aceptar</button>
                                           <button type="submit" name="rechazar" value="Cancelar" class="btn btn-sm btn-danger">Cancelar</button>
                                       </td>
                                   </tr>
                                   <input type="text" name="id" value="<?php echo $tutor['id']?>" hidden>
                               </form>
                               <?php $t++; endforeach ?>
                           </tbody>
                       </table>
                    <?php else: ?>
                    <div style="margin: 10px;" class="text-muted text-center">"No hay solicitudes de registro nuevas"</div>
                    <?php endif ?>
                </div>
            </div>
            <div class="card" style="border-color: #e74c3c">
                <div class="card-header text-white h3" style="background-color: #e74c3c">Solicitudes de Registro: Alumnos</div>
                <div class="card-body" style="padding: 0;">
                   
                   <?php if(!empty($resultado)): ?>
                   
                   <table class="table table-responsive table-striped">
                        <thead class="text-white" style="background-color: #c0392b; font-size:12px;">
                            <th scope="col">Nombre</th>
                            <th scope="col">No. Control</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acción</th>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $usuario): ?>
                                <form method="POST" name="validar<?php echo $i?>" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    <tr>
                                        <td class="text-capitalize"><?php echo $nombre = $usuario['nombre'].' '.$usuario['a_paterno'].' '.$usuario['a_materno'] ?></td>
                                        <td><?php echo $usuario['no_control']?></td>
                                        <td><?php echo $usuario['division'] ?></td>
                                        <td><?php echo $usuario['semestre'] ?></td>
                                        <td><?php echo $usuario['email'] ?></td>
                                        <td>
                                           <button type="submit" value="Aceptar" name="aceptar" class="btn btn-sm btn-primary">Aceptar</button>
                                           <button type="submit" value="Cancelar" name="rechazar" class="btn btn-sm btn-danger">Cancelar</button>
                                        </td>
                                    </tr>
                                    <input type="text" name="id" value="<?php echo $usuario['id']?>" hidden>
                                </form>
                                <?php $i++; endforeach ?>
                                <!-- Pruebas -->
                            </tbody>
                        </table>
                   
                   <?php else: ?>
                   <div style="margin: 10px;" class="text-muted text-center">"No hay solicitudes de registro nuevas"</div>
                   <?php endif ?>
                   
                    
                    </div>
                </div>
            </div>
            <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
        </div>
    </div>
    <?php
    include_once '../plantillas/doc-cierre.inc.php';
    ?>