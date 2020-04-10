<?php session_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/op_tutor_reporte.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}
$conexion = conexion($db_config);
$DATOSACTIVIDADES = $conexion->prepare('CALL datos_plantrabajo_reportes(:id_grupo)');
$DATOSACTIVIDADES->execute(array(':id_grupo' => $_GET['g']));
$ACTIVIDADES = $DATOSACTIVIDADES->fetchall();
$DATOSACTIVIDADES->closeCursor();
/*-- --------------------- --*/
$mostrarActividadOrd= array();
$contador = 1;
foreach ($ACTIVIDADES as $key ) {
  if($contador <= 5 && $_GET['r'] == 1){
    $mostrarActividadOrd[]=$key;
  }
  if($contador > 5 && $contador <=9 && $_GET['r'] == 2){
    $mostrarActividadOrd[]=$key;
  }
  if($contador > 9  && $_GET['r'] == 3){
    $mostrarActividadOrd[]=$key;
  }

  $contador++;
}


?>
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
fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt",

  toolbar: 'undo redo | fontselect fontsizeselect formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | table',
powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',

});</script>
<div class="container">
    <?php if (!empty($_GET['a'])): ?>
    <?php if($_GET['a'] == 1):?>
    <div class="alert alert-success alert-dissmissible fade show" role="alert">¡Archivo subido exitosamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php endif?>
    <?php if($_GET['a'] == 2):?>
    <div class="alert alert-success alert-dissmissible fade show" role="alert">¡Archivo eliminado exitosamente! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    <?php endif?>
    <?php endif ?>
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
          
            <p>
                <a class="btn btn-sm btn-wine" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Formatos de docencia</a>
            </p>
                <div class="collapse" id="formatos">
                  <div class="card card-body" style="margin-bottom:20px">
                  	
                    <table class="table table-responsive table-striped">
                        <tbody>
                            <?php if(!empty($formatos)):?>
                            <?php foreach($formatos as $formato):?>
                            <?php if($formato['tipo'] == 'plan_trabajo'):?>
                            <tr>
                                <th>Plan de Trabajo:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'programa'):?>
                            <tr>
                                <th>Programa:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'registro_tutorado'):?>
                            <tr>
                                <th>Registro del Tutorado:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'reporte_parcial'):?>
                            <tr>
                                <th>Reporte Parcial:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                            </tr>
                            <?php elseif($formato['tipo'] == 'reporte_final'):?>
                            <tr>
                                <th>Reporte Final:</th>
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato['archivo']?>"><?php echo $formato['archivo']?></a>
                                </td>
                            </tr>
                            <?php endif?>
                            <?php endforeach ?>

                            <?php else:?>
                            <div class="text-center text-muted">Aun no se ha subido ningún formato...</div>
                            <?php endif?>
                        </tbody>
                    </table>
                      <table class="table table-responsive table-striped">
                           <center> <span>Otros </span></center>
                                                   <tbody>
                            <?php 
 foreach($formatos as $formato1):?>
                               <?php if($formato1['tipo'] == 'otro'):?>
                            <tr>
                                
                                <td>
                                    <a target="_blank" href="../docs/formatos/<?php echo $formato1['archivo']?>"><?php echo $formato1['archivo']?></a>
                                </td>
                               
                            </tr>

                            <?php endif?>
                                 <?php endforeach ?>
                    </table>
              </div>
            </div>
          
      

          
            
             <div class="card border-danger" style="margin-bottom: 20px;">

                <div class="card-header h3 text-light" style="background-color: #e74c3c">Reporte Parcial de Tutorias</div>
                <div class="card-body">
                   <?php  $contadoR = 0; if (!empty($plan) ): ?>
<?php $r = "Reporte_Parcial_".$_GET['r'].""; foreach($plan as $arch){ if($arch['archivo'] == $r) { $contadoR = $contadoR+1;  ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/op_tutor_reporte.php?g=<?php echo $_GET['g']; ?>&n=<?php echo $_GET['r']; ?>" method="POST">
                                <a target="_blank" href="../docs/planificacion/<?php echo $_GET['g']; ?>/<?php echo $arch['archivo'] ?>.pdf" class="alert-link h5"><i class="material-icons">description</i> <?php $nombredelarchivo = str_replace("_", " ", $arch['archivo']);echo $nombredelarchivo;?></a> <div>Fecha: <?php echo $arch['fec_sub'] ?></div>
                                <div>Estado: 
                                <?php if($arch['estado'] == "1"):?>
                                <strong class="badge badge-secondary">En Proceso de Revision</strong>
                                <?php elseif($arch['estado'] == "0"): ?>
                                <strong class="badge badge-warning">No Enviado</strong>
                                <?php elseif($arch['estado'] == "2"): ?>
                                <strong class="badge badge-success">Revisado</strong>
                                <?php elseif($arch['estado'] == "3"): ?>
                                <strong class="badge badge-danger">Rechazado</strong>
                                <?php endif ?>
                                </div>
                                <div class="text-right"><input name="EnviarPlan" type="submit" class="btn btn-sm btn-outline-success" value="Enviar"><input name="delete" type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar"></div>
                                <input name="id" type="text" value="<?php echo $arch['id']?>" hidden>
                                <input name="file" type="text" value="<?php echo $arch['archivo']?>" hidden>
                            </form>
                        </div>
        <?php  } } ?>
                        <?php else: ?>
                            <p class="text-muted">"Aun no tiene ningún plan de trabajo..."</p>
                            
                    </form>
                    <?php endif ?>
                	    	<form method="POST" action="/PITA-2.0.1/GenerarPDF.php?g=<?php echo $_GET['g'];?>">
                  	 <textarea name="GuardarPlanDeTrabajo">
               <h1 class="MsoTitle" style="text-align: center;"><span style="font-family: arial, sans-serif;">REPORTE PARCIAL DE TUTORIAS</span><br /><strong><span style="font-size: 14.0pt; line-height: 115%; color: black;">Reporte No.<span style="text-decoration: underline;"><?php echo $_GET['r'];?>  </span></span></strong></h1>
<table style="border-collapse: collapse; width: 100%;" border="1">
  <?php foreach ($DTBUSER as $datos) {
    # code...
    ?>
<tbody>
<tr>
<td style="width: 66.6666%;" colspan="2" scope="rowgroup">Nombre: <?php echo "".$datos['nombre']." ".$datos['a_paterno']." ".$datos['a_materno'].""; ?></td>
<td style="width: 33.3333%;">Fecha: <?php echo date('Y-m-d'); ?></td>
</tr>
<tr>
<td style="width: 33.3333%;">Grupo y semestres: <?php echo $datos['semestre'];?>º.<?php echo $datos['grupo'];?></td>
<td style="width: 33.3333%;">Carrera: <?php echo $datos['carrera'];?></td>
<td style="width: 33.3333%;">Periodo: <?php echo $datos['meses'];?> <?php echo $datos['anio'];?></td>
</tr>
</tbody>
<?php } ?>
</table>
<p>&nbsp;</p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 4.6119%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>No</strong></span></td>
<td style="width: 19.8173%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>Actividad Realizada </strong></span></td>
<td style="width: 20.9133%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>Fecha</strong></span></td>
<td style="width: 21.3242%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>Problem&aacute;ticas presentadas</strong></span></td>
<td style="width: 16.6667%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>Objetivo Logrado </strong></span></td>
<td style="width: 16.6667%; text-align: center;"><span style="font-family: arial, sans-serif;"><strong>Observaciones </strong></span></td>
</tr>
<?php $entr = array(); $nm = 1;  foreach ($mostrarActividadOrd as $Actividad ) {
 
if($nm== 1)
{
    $entr['fechaIn'] = $Actividad['fecha_entrega'];
}
if ($nm == count($mostrarActividadOrd)) {
    $entr['fechaFin'] = $Actividad['fecha_entrega'];
}


 ?>



<tr>
<td style="width: 4.6119%;"> <?php echo $nm; ?></td>
<td style="width: 19.8173%;"><?php echo $Actividad['titulo'];?></td>
<td style="width: 20.9133%;"><?php echo $Actividad['fecha_entrega'];?></td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;"><?php echo $Actividad['objetivo_actividad'];?></td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
<?php $nm++; }



$datosEntrevista = $conexion->prepare('CALL datos_entrevista(:fechain, :fechafin)');
$datosEntrevista->execute(array(':fechain' => $entr['fechaIn'],'fechafin'=>  $entr['fechaFin']));
$Entrevistas = $datosEntrevista->fetchall();
$datosEntrevista->closeCursor();



?>


</tbody>
</table>

<p class="MsoNoSpacing" style="text-align: center; margin: 3.0pt 0cm 3.0pt 0cm;"><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span></p>
<table class="MsoNormalTable" style="border-collapse: collapse; margin-left: 4.8pt; margin-right: 4.8pt;" border="0" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="width: 281.85pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><?php echo "".$datos['nombre']." ".$datos['a_paterno']." ".$datos['a_materno'].""; ?></p>
</td>
<td style="width: 63.75pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
<td style="width: 248.1pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">(20)</p>
</td>
</tr>
<tr>
<td style="width: 281.85pt; border: none; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;Nombre y Firma del Tutor</p>
</td>
<td style="width: 63.75pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
<td style="width: 248.1pt; border: none; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">Vo. Bo. del Jefe de Divisi&oacute;n</p>
</td>
</tr>
<tr>
<td style="width: 593.7pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="5" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.9pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
<td style="width: 328.75pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="3" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">(21)</p>
</td>
<td style="width: 124.05pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.9pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
<td style="width: 328.75pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="3" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">Nombre y firma del Coordinador de Tutor&iacute;as</p>
</td>
<td style="width: 124.05pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="border: none;">&nbsp;</td>
<td style="border: none;">&nbsp;</td>
<td style="border: none;">&nbsp;</td>
<td style="border: none;">&nbsp;</td>
<td style="border: none;">&nbsp;</td>
</tr>
</tbody>
</table>
<p class="MsoNoSpacing" style="margin: 3.0pt 0cm 3.0pt 0cm;"><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span><br /><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span><br /><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span><br /><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span></p>
</textarea>
<input  name="Codigo" type="hidden" value="ITESCO-AC-PO-008-05">
<input  name="Titulo" type="hidden" value="Reporte Parcial <?php echo $_GET['r'];?>">
<input  name="Grupo" type="hidden" value="<?php echo $_GET['g']; ?>">
<button name="submitbtn" class="btn btn-block btn-wine mt-4"> GUARDAR </button>
</form>
          
                </div>
            </div>



    <div class="card border-danger" style="margin-bottom: 20px;">

                <div class="card-header h3 text-light" style="background-color: #e74c3c">Entrevistas</div>
                <div class="card-body">
                   <?php  $contadoR = 0; if (!empty($plan) ): ?>
<?php $r = "Entrevistas_Parcial_".$_GET['r'].""; foreach($plan as $arch){ if($arch['archivo'] == $r) { $contadoR = $contadoR+1;  ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/op_tutor_reporte.php?g=<?php echo $_GET['g']; ?>&n=<?php echo $_GET['r']; ?>" method="POST">
                                <a target="_blank" href="../docs/planificacion/<?php echo $_GET['g']; ?>/<?php echo $arch['archivo'] ?>.pdf" class="alert-link h5"><i class="material-icons">description</i> <?php $nombredelarchivo = str_replace("_", " ", $arch['archivo']);echo $nombredelarchivo;?></a> <div>Fecha: <?php echo $arch['fec_sub'] ?></div>
                                <div>Estado: 
                                <?php if($arch['estado'] == "1"):?>
                                <strong class="badge badge-secondary">En Proceso de Revision</strong>
                                <?php elseif($arch['estado'] == "0"): ?>
                                <strong class="badge badge-warning">No Enviado</strong>
                                <?php elseif($arch['estado'] == "2"): ?>
                                <strong class="badge badge-success">Revisado</strong>
                                <?php elseif($arch['estado'] == "3"): ?>
                                <strong class="badge badge-danger">Rechazado</strong>
                                <?php endif ?>
                                </div>
                                <div class="text-right"><input name="EnviarPlan" type="submit" class="btn btn-sm btn-outline-success" value="Enviar"><input name="delete" type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar"></div>
                                <input name="id" type="text" value="<?php echo $arch['id']?>" hidden>
                                <input name="file" type="text" value="<?php echo $arch['archivo']?>" hidden>
                            </form>
                        </div>
        <?php  } } ?>
                        <?php else: ?>
                            <p class="text-muted">"Aun no tiene ningún plan de trabajo..."</p>
                            
                    </form>
                    <?php endif ?>
                            <form method="POST" action="/PITA-2.0.1/GenerarPDF.php?g=<?php echo $_GET['g'];?>">
                     <textarea name="GuardarPlanDeTrabajo">
             <h2 class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: arial, sans-serif;">ENTREVISTAS INDIVIDUALES REALIZADAS</span><span style="font-size: 5.0pt;">&nbsp;</span></h2>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 15.2055%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>Fecha </strong></span></p>
</td>
<td style="width: 15.6164%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>Nombre del Alumno </strong></span></p>
</td>
<td style="width: 15.6164%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>No. Control </strong></span></p>
</td>
<td style="width: 16.1644%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>Asignatura </strong></span></p>
</td>
<td style="width: 16.5753%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>Problem&aacute;tica </strong></span></p>
</td>
<td style="width: 20.5479%; text-align: center;">
<p><span style="font-family: arial, sans-serif;"><strong>Recomendaciones </strong></span></p>
</td>
</tr>
<?php foreach ($Entrevistas as $mostrarE) {?>


<tr>
<td style="width: 15.2055%;"><?php echo $mostrarE['fecha'];?></td>
<td style="width: 15.6164%;"><?php echo $mostrarE['nombre'];?> <?php echo $mostrarE['a_paterno'];?> <?php echo $mostrarE['a_materno'];?></td>
<td style="width: 15.6164%;"><?php echo $mostrarE['no_control'];?></td>
<td style="width: 16.1644%;">&nbsp;</td>
<td style="width: 16.5753%;">&nbsp;</td>
<td style="width: 20.5479%;">&nbsp;</td>
</tr>
<?php } ?>
</tbody>
</table>
<p class="MsoNoSpacing" style="text-align: center; margin: 3.0pt 0cm 3.0pt 0cm;"><span style="font-family: Arial, sans-serif; font-size: 10pt;">&nbsp;</span></p>
<p class="MsoNoSpacing" style="margin: 3.0pt 0cm 3.0pt 0cm;"><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span><br /><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span><br /><br /><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span></p>
</textarea>
<input  name="Codigo" type="hidden" value="ITESCO-AC-PO-008-05">
<input  name="Titulo" type="hidden" value="Entrevistas Parcial <?php echo $_GET['r'];?>">
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
