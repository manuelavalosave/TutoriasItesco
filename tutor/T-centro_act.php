<?php session_start();
ini_set('display_errors', 0);
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
$act = $conexion->prepare("SELECT * FROM actividades WHERE id_grupo = $grupo AND MostrarAlumno=0");
$act->execute();
$actividades = $act->fetchAll();
$act2 = $conexion->prepare("SELECT * FROM actividades WHERE id_grupo = $grupo AND MostrarAlumno=1");
$act2->execute();
$actividades2 = $act2->fetchAll();
$statement = $conexion->prepare('SELECT * FROM formatos_tutor WHERE autor = :autor and id_grupo = :id');
$statement->execute(array(":autor" => $_SESSION['usuario']['0'], 'id' => $_GET['g']));
$plan = $statement->fetch();
$i = 1;
$cn = 1;
?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
           <?php if($_GET['a'] == 1): ?>
           <div class="alert alert-success alert-dissmissible fade show" role="alert">¡La actividad se ha creado exitosamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
           <?php endif ?>
           <div class="card border-primary" style="max-height: 600px">
                <div class="card-header h3 text-light" style="background-color: #3498db">ACTIVIDADES PLAN DE TRABAJO</div>
                <div class="card-body" style="overflow-y: scroll; padding: 0;">
                    <table class="table table-striped">
                        <thead class="text-white" style="background-color: #2980b9">
                        <th scope="col">#</th>
                        <th scope="col">Nombre de la actividad</th>
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
                                 
                                    <td><?php echo strftime("%d de %b del %G", strtotime($actividad['fecha_entrega']))?></td>
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
<BR>
            <div class="card border-primary" style="max-height: 600px">





                <div class="card-header h3 text-light" style="background-color: #8db342">ACTIVIDADES DEL TUTORADO</div>
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
                            <?php if(empty($actividades2)): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="5">Aun no hay actividades</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($actividades2 as $actividad): ?>
                                <tr>
                                    <td><?php echo $cn ?></td>
                                    <td><?php echo $actividad['titulo']?></td>
                                    <td>Activa</td>
                                    <td><?php echo strftime("%d de %b del %G", strtotime($actividad['fecha_entrega']))?></td>
                                    <td>
                                       <a href="../tutor/actividad.php?g=<?php echo $_GET['g']; ?>&id=<?php echo $actividad['id_actividad']?>" class="btn btn-block btn-sm btn-outline-primary">Ver</a>
                                           
                                       
                                    </td>
                                </tr>
                                <?php $cn++; endforeach ?>
                            <?php endif?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right card-footer" style="padding: 10px 10px;">
                    <a href="crear_actividad.php?g=<?php echo $_GET['g']; ?>" class="btn btn-outline-danger">Generar Actividad nueva</a>
                </div>
<br>
                <script>
 var variable=document.getElementsByTagName("td")[0].innerHTML;
 console.log(variable);
      
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.0/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea',

height: 500,
 
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount','save'
  ],
font_formats: "Calibri=calibri,sans-serif; Arial=arial,sans-serif",
fontsize_formats: "8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt",

  toolbar: 'undo redo | fontselect fontsizeselect formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | table',
  save_enablewhendirty: true,
powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',

});</script>


            </div><br>
            <div class="card border-danger" style="margin-bottom: 20px;">
                <div class="card-header h3 text-light" style="background-color: #e74c3c">GENERAR PLAN DE TRABAJO</div>
                <div class="card-body">
                  <?php if (!empty($plan)): ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/post.php?g=<?php echo $_GET['g']; ?>" method="POST">
                                <a target="_blank" href="../docs/planificacion/<?php echo $_GET['g']; ?>/<?php echo $plan['archivo'] ?>.pdf" class="alert-link h5"><i class="material-icons">description</i> <?php $nombredelarchivo = str_replace("_", " ", $plan['archivo']);echo $nombredelarchivo;?></a> <div>Fecha: <?php echo $plan['fec_sub'] ?></div>
                                <div>Estado: 
                                <?php if($plan['estado'] == "1"):?>
                                <strong class="badge badge-secondary">En Proceso de Revision</strong>
                                <?php elseif($plan['estado'] == "0"): ?>
                                <strong class="badge badge-warning">No Enviado</strong>
                                <?php elseif($plan['estado'] == "2"): ?>
                                <strong class="badge badge-success">Revisado</strong>
                                <?php elseif($plan['estado'] == "3"): ?>
                                <strong class="badge badge-danger">Rechazado</strong>
                                <?php endif ?>
                                </div>
                                <div class="text-right"><input name="EnviarPlan" type="submit" class="btn btn-sm btn-outline-success" value="Enviar"><input name="delete" type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar"></div>
                                <input name="id" type="text" value="<?php echo $plan['id']?>" hidden>
                                <input name="file" type="text" value="<?php echo $plan['archivo']?>" hidden>
                            </form>
                        </div>
                        <?php else: ?>
                            <p class="text-muted">"Aun no tiene ningún plan de trabajo..."</p>
                            
                    </form>
                    <?php endif ?>

    <form method="POST" action="../GenerarPDF.php?g=<?php echo $_GET['g'];?>">
                     <textarea id="plandetrabajo" name="GuardarPlanDeTrabajo">
                      <?php if(empty($plan)){?>
       <p style="padding-left: 40px; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><u>PLAN DE TRABAJO DEL TUTOR PARA SESION PRESENCIAL</u></span></strong></p>
<table style="border-collapse: collapse; width: 100.457%; height: 96px; border-style: none; margin-left: auto; margin-right: auto;" border="1" cellspacing="0" cellpadding="0">
<tbody>
  <?php foreach ($DTBUSER as $datos) {
    # code...
    ?>
<tr style="height: 22px;">
<td style="width: 50.3196%; height: 22px;" colspan="6"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">NOMBRE: <?php echo "".$datos['nombre']." ".$datos['a_paterno']." ".$datos['a_materno']."";?> &nbsp;</span></strong></td>
<td style="height: 22px; width: 50.1826%;" colspan="3"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">PERIODO: <?php echo "".$datos['meses']." ".$datos['anio']."";?> </span></strong><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><br /></span></strong></td>
</tr>
<tr style="height: 22px;">
<td style="width: 34.9467%; height: 22px;" colspan="4"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">CARRERA: <?php echo $datos['carrera']; ?></span></strong></td>
<td style="width: 15.3729%; height: 22px;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">SEMESTRE: <?php echo $datos['semestre']; ?></span></strong></td>
<td style="height: 22px; width: 27.8539%;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">GRUPO: <?php echo $datos['grupo']; ?></span></strong></td>
<td style="width: 22.3288%; height: 22px;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Aula:</span></strong></td>
</tr>
<?php } ?>


<tr style="height: 44px;">
<td style="width: 4.93151%; height: 10px; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">No.</span></strong></td>
<td style="width: 14.9315%; height: 10px; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Fecha </span></strong><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">programada</span></strong></td>
<td style="width: 14.9315%; height: 10px; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Actividad a realizar</span></strong></td>
<td style="height: 10px; width: 9.74125%; text-align: center;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Objetivo de la&nbsp; Actividad</span></strong></td>
<td style="height: 10px; width: 22.9833%; text-align: center;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Materiales a utilizar</span></strong></td>
<td style="height: 10px; text-align: center; width: 32.9833%;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;">Observaciones</span></strong><br /><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><br /></span></strong></td>
</tr>
<?php
$cont = 0;
 foreach ($actividades as $act) {
  $cont = $cont+1;
  ?>
<tr style="height: 21px;">
<td style="width: 4.93151%; height: 21px;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $cont;?></span></strong></td>
<td style="width: 14.9315%; height: 21px;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $act['fecha_entrega']; ?></span></strong></td>
<td style="width: 14.9315%; height: 21px;"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $act['titulo']; ?></span></span></strong></td>
<td style="width: 9.74125%; height: 21px;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $act['objetivo_actividad']; ?></span></span></strong></td>
<td style="width: 22.9833%; height: 21px;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $act['materiales_utilizar']; ?></span></span></strong></td>
<td style="text-align: center; width: 32.9833%; height: 21px;" colspan="2"><strong><span style="font-family: calibri, sans-serif; font-size: 11pt;"><?php echo $act['observaciones']; ?></span></span></strong></td>
</tr>
<?php } ?>

</tbody>
</table>
<p>&nbsp;</p>
<table style="border-collapse: collapse; width: 100%; margin-left: auto; margin-right: auto; height: 111px;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 45px;">
<td style="height: 45px;"><span style="font-family: calibri, sans-serif;"><strong>Fecha de entrega de programaci&oacute;n</strong></span></td>
<td style="height: 45px;" colspan="3"><span style="font-family: calibri, sans-serif;"><strong>Periodo Programado para 1er, 2do y 3er. Seguimiento</strong></span></td>
<td style="height: 45px;"><span style="font-family: calibri, sans-serif;"><strong>Fecha Programada de entrega de reporte final</strong></span></td>
</tr>
<tr style="height: 66px;">
<td style="height: 66px;"><span style="font-family: calibri, sans-serif;">Primera semana</span></td>
<td style="height: 66px;"><br /><span style="font-family: calibri, sans-serif;">Semana 5</span><br /><br /></td>
<td style="height: 66px;"><span style="font-family: calibri, sans-serif;">Semana 9</span></td>
<td style="height: 66px;"><span style="font-family: calibri, sans-serif;">Semana 13</span></td>
<td style="height: 66px;"><span style="font-family: calibri, sans-serif;">Ultima semana</span></td>
</tr>
</tbody>
</table>
<div align="center">&nbsp;</div>
<div align="center">
<table class="MsoNormalTable" style="border-collapse: collapse; width: 30%; height: 46px; margin-left: auto; margin-right: auto;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.35pt;">
<td style="width: 543.403px; border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0cm 5.4pt; height: 21px;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center">&nbsp;</p>
</td>
</tr>
<tr style="height: 19.75pt;">
<td style="width: 543.403px; border: none; padding: 0cm 5.4pt; height: 25px;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center">Nombre y firma del Docente Tutor</p>
</td>
</tr>
</tbody>
</table>
</div>
<?php } else{
  $rutaHTML = "http://localhost/PITA-2.0.1/docs/html/".$_GET['g']."/".$plan['archivo'].".html";
$página_inicio = file_get_contents($rutaHTML);
echo $página_inicio;

}?>
</textarea>
<input  name="Codigo" type="hidden" value="ITESCO-AC-PO-008-04">
<input  name="Titulo" type="hidden" value="Plan de trabajo del Tutor">
<input  name="Grupo" type="hidden" value="<?php echo $_GET['g']; ?>">
<button name="submitbtn" class="btn btn-block btn-wine mt-4"> GUARDAR </button>
</form>


                    
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>

