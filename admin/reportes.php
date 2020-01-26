<?php
session_start();
if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/post.php';
    require_once '../app/conexion.php';
    include_once '../app/op_admin_reportes.php';
  
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>
<div class="container">
   <?php if($_GET['a'] == 1): ?>
   <div style="margin-top: 20px;" class="alert alert-info alert-dissmissible fade show" role="alert">Planes: Cambios realizados <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <?php elseif($_GET['a'] == 2): ?>
   <div style="margin-top: 20px;" class="alert alert-info alert-dissmissible fade show" role="alert">Reportes: Cambios realizados <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <?php elseif($_GET['a'] == 3): ?>
   <div style="margin-top: 20px;" class="alert alert-success alert-dissmissible fade show" role="alert">Formatos:El archivo ya se encuentra en la plataforma!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <?php elseif($_GET['a'] == 4): ?>
   <div style="margin-top: 20px;" class="alert alert-success alert-dissmissible fade show" role="alert">Formatos: Archivo subido correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <?php elseif($_GET['a'] == 5): ?>
   <div style="margin-top: 20px;" class="alert alert-danger alert-dissmissible fade show" role="alert">Formatos: Archivo eliminado <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
   <?php endif; ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           
           <p>
                <a class="btn btn-sm btn-wine" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Formatos de docencia</a>
            </p>
                <div class="collapse" id="formatos">
                  <div class="card card-body" style="margin-bottom:20px">
                    <table class="table table-responsive table-striped">
                        <tbody>
                            <?php 
 foreach($formatos as $formato):?>

                            <?php if($formato['tipo'] == 'plan_trabajo'):?>
                            <tr>
                                <th>Plan de Trabajo:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'programa'):?>
                            <tr>
                                <th>Programa:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'registro_tutorado'):?>
                            <tr>
                                <th>Registro del Tutorado:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'reporte_parcial'):?>
                            <tr>
                                <th>Reporte Parcial:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'reporte_final'):?>
                            <tr>
                                <th>Reporte Final:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif?>
                          
                            <?php endforeach ?>
                        </tbody>

                         <table class="table table-responsive table-striped">
                           <center> <span>Otros </span></center>
                                                   <tbody>
                            <?php 
 foreach($formatos as $formato1):?>
                               <?php if($formato1['tipo'] == 'otro'):?>
                            <tr>
                                <th>#####</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato1['archivo']?>"><?php echo $formato1['archivo']?></a>
                                </td>
                                <td>
                                    <form name="<?php echo $formato1['tipo']?>" action="../app/op_admin_reportes.php" method="post">
                                    <input name="file" type="text" value="<?php echo $formato1['archivo']?>" hidden>
                                    <button name="f_eliminar" type="submit" class="btn btn-sm btn-outline-danger" value="1">Eliminar archivo</button>
                                    </form>
                                </td>
                            </tr>

                            <?php endif?>
                                 <?php endforeach ?>
                    </table>
                    <div class="alert alert-info">
                    <label for="tipo">Subir Archivo</label>
                    <form name="form-format" enctype="multipart/form-data" action="../app/op_admin_reportes.php" method="post">
                    <select class="form-control form-control-sm" name="tipo">
                    <option value="plan_trabajo">Plan de trabajo</option>
                    <option value="programa">Programa</option>
                    <option value="registro_tutorado">Registro del tutorado</option>
                    <option value="reporte_parcial">Reporte parcial</option>
                    <option value="reporte_final">Reporte final</option>
                     <option value="otro">otros</option>
                    </select>
                    <p></p>
                    <input name="formato" type="file" accept=".pdf,.docx" class="form-control form-control-sm" required>
                    <label for="formato" style="font-size:12px">*Acepta archivos .pdf y .docx</label>
                    <div class="text-right"><button name="b_formatos" type="submit" class="btn btn-sm btn-info" value="subir">Subir archivo</button></div>
                    </form>
                </div>
              </div>
            </div>
           
            <div class="card" style="border-color: #34495e; margin-bottom: 20px; max-height: 500px;">
                <div class="card-header h3 text-white" style="background-color: #34495e">Plan de Trabajo</div>
                <div class="card-body" style="padding:0;  overflow-y:scroll;">
                <table class="table table-responsive table-striped">
                    <thead class="text-white" style="background: #2c3e50">
                        <th scope="col">#</th>
                        <th scope="col">Docente</th>
                        <th scope="col" class="text-center">Fecha de subida</th>
                        <th scope="col" class="text-center">Archivo</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Revisión</th>
                    </thead>
                    <tbody>
                       <?php if(!empty($planes)):?>
                        <?php foreach($planes as $plan): ?>
                            <tr>
                                <td><?php echo $i?></td>
                            <td class="text-capitalize"><?php $name = obtener_usuario($plan['autor'],$conexion); echo $name['nombre'];?></td>
                            <td class="text-center"><?php echo $plan['fec_sub'] ?></td>
                            <th class="text-center">
                                <a class="btn btn-sm btn-outline-secondary" target="_blank" href="../docs/planificacion/<?php echo $plan['Id_grupo']?>/<?php echo $plan['archivo']?>.pdf" ><i class="material-icons">insert_drive_file</i></a>
                                <!--<a class="btn btn-sm btn-outline-secondary" href="#" download="../docs/planes/<?php echo $plan['archivo']?>">Descargar</a>-->
                            </th>
                            <?php if($plan['estado'] == "1"):?>
                            <td class="text-center text-muted"><i class="material-icons">access_time</i></td>
                            <?php elseif($plan['estado'] == "2"):?>
                            <td class="text-center text-success"><i class="material-icons">check_circle</i></td>
                            <?php elseif($plan['estado'] == "3"): ?>
                            <td class="text-center text-danger"><i class="material-icons">cancel</i></td>
                            <?php endif?>
                            <td class="text-center">
                                <form name="F-planes" action="../app/op_admin_reportes.php" method="post">
                                <input name="id" type="text" value="<?php echo $plan['id']?>" hidden>
                                <button name="p-aceptar" class="btn btn-sm btn-outline-success" value="aceptar" type="submit">Aceptar</button>
                                <button name="p-cancelar" class="btn btn-sm btn-outline-danger" value="cancelar" type="submit">Cancelar</button>
                                </form>
                            </td>
                            </tr>
                        <?php $i++; endforeach ?>
                        <?php else: ?>
                        <tr>
                            <th class="text-center text-muted" colspan="6">Aun no se ha registrado ningún plan...</th>
                        </tr>
                        <?php endif?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card" style="border-color: #34495e; max-height: 500px;">
                <div class="card-header h3 text-white" style="background: #34495e">Reportes parciales</div>
                <div class="card-body" style="padding:0; overflow-y:scroll;">
                    <table class="table table-responsive table-striped">
                        <thead class="text-white" style="background: #2c3e50">
                            <th scope="col">#</th>
                            <th scope="col">Docente</th>
                            <th class="text-center" scope="col">Parcial</th>
                            <th class="text-center" scope="col">Archivo</th>
                            <th class="text-center" scope="col">Estado</th>
                            <th class="text-center" scope="col">Revisión</th>
                        </thead>
                        <tbody>
                          <?php if(!empty($reportes)):?>
                           <?php foreach($reportes as $reporte): ?>
                               <tr>
                                   <td><?php echo $j ?></td>
                                   <td class="text-capitalize"><?php $name = obtener_usuario($reporte['autor'],$conexion); echo $name['nombre'];?></td>
                                   <td class="text-center"><?php echo $reporte['parcial']?></td>
                                   <td class="text-center">
                                   <a href="../docs/reportes/<?php echo $reporte['archivo']?>" class="btn btn-sm btn-outline-secondary" target="_blank"><i class="material-icons">insert_drive_file</i></a>
                                   </td>
                                   <?php if($reporte['estado'] == "1"):?>
                                   <td class="text-center text-secondary"><i class="material-icons">access_time</i></td>
                                   <?php elseif($reporte['estado'] == "2"): ?>
                                   <td class="text-center text-success"><i class="material-icons">check_circle</i></td>
                                   <?php elseif($reporte['estado'] == "3"): ?>
                                   <td class="text-center text-danger"><i class="material-icons">cancel</i></td>
                                   <?php endif; ?>
                                   <td class="text-center">
                                    <form name="F-repo" action="../app/op_admin_reportes.php" method="post">
                                    <input name="r-id" type="text" value="<?php echo $reporte['id']?>" hidden>
                                    <button name="r-aceptar" type="submit" class="btn btn-sm btn-outline-success" value="aceptar">Aceptar</button>
                                    <button name="r-rechazar" type="submit" class="btn btn-sm btn-outline-danger" value="cancelar">Rechazar</button>
                                   </form>
                                   </td>
                               </tr>
                           <?php $j++; endforeach ?>
                           <?php else: ?>
                            <tr>
                            <th class="text-center text-muted" colspan="6">Aun no se ha registrado ningún reporte...</th>
                            </tr>
                           <?php endif ?>
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