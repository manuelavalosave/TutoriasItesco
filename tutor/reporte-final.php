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


/*-- --------------------- --*/


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
fontsize_formats: "8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt",

  toolbar: 'saveToPdf | save |undo redo | fontselect fontsizeselect formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | table',
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

                <div class="card-header h3 text-light" style="background-color: #e74c3c">Reporte Final</div>
                <div class="card-body">
                   <?php  $contadoR = 0; if (!empty($plan) ): ?>
<?php if($plan['archivo'] == "Reporte_Parcial_de_Tutorias") { $contadoR = $contadoR+1;  ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/op_tutor_reporte.php?g=<?php echo $_GET['g']; ?>" method="POST">
                                <a target="_blank" href="../docs/planificacion/<?php echo $_GET['g']; ?>/<?php echo $plan['archivo'] ?>.pdf" class="alert-link h5"><i class="material-icons">description</i> <?php $nombredelarchivo = str_replace("_", " ", $plan['archivo']);echo "Reporte Parcial $contadoR";?></a> <div>Fecha: <?php echo $plan['fec_sub'] ?></div>
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
        <?php } ?>
                        <?php else: ?>
                            <p class="text-muted">"Aun no tiene ningún Reporte Final..."</p>
                            
                    </form>
                    <?php endif ?>
                 <form method="POST" action="http://localhost/PITA-2.0.1/RegistroFormatoPDF.php?g=<?php echo $_GET['g'];?>">
                     <textarea name="GuardarPlanDeTrabajo">
                      <p style="text-align: center;"><span style="font-size: 14pt; font-family: calibri, sans-serif;"><strong>REPORTE FINAL DE TUTORIAS</strong></span></p>
                      <?php foreach ($DTBUSER as $datos) {
    # code...
    ?>
<p style="text-align: left;"><span style="font-size: 11pt; font-family: calibri, sans-serif;">Grupo: <u>___<?php echo $datos['grupo'];?>______</u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;S</span>emestre: <u>_____<?php echo $datos['semestre'];?>º____</u>&nbsp; &nbsp; &nbsp; &nbsp; Fecha:________________</p>
<p style="text-align: left;">Carrera:<u>____<?php echo $datos['carrera'];?>____</u></p>
<p style="text-align: left;">N&deg; de estudiantes que iniciaron el semestre:___________</p>
<p style="text-align: left;">&nbsp;</p> <?php } ?>
<p style="text-align: left;"><span style="font-family: calibri, sans-serif;"><strong>I. ESTUDIANTES IRREGULARES (AL INICIAR EL SEMESTRE)</strong></span></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 33.3333%; text-align: center;"><strong><span style="font-size: 11pt; font-family: calibri, sans-serif;">Nombre</span></strong></td>
<td style="width: 33.3333%; text-align: center;"><span style="font-size: 10pt; font-family: calibri, sans-serif;"><strong>Materia que adeuda</strong></span></td>
<td style="width: 33.3333%; text-align: center;"><strong><span style="font-size: 10pt; font-family: calibri, sans-serif;">Resultados al finalizar el semestre</span></strong></td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
</tbody>
</table>
<p style="text-align: left;"><strong><span style="font-family: calibri, sans-serif;">II. ESTUDIANTE CON PROBLEMAS</span></strong></p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 33.3333%; text-align: center;"><span style="font-size: 10pt; font-family: calibri, sans-serif;"><strong>Nombre</strong></span></td>
<td style="width: 33.3333%; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Tipo de problema</span></strong></td>
<td style="width: 33.3333%; text-align: center;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Seguimiento</span></strong></td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
<td style="width: 33.3333%;">&nbsp;</td>
</tr>
</tbody>
</table>
<p style="text-align: left;"><strong><span style="font-family: calibri, sans-serif;">III. BAJAS Y DESERC&Iacute;ON DURANTE EL SEMESTRE</span></strong></p>
<table style="border-collapse: collapse; width: 100%; height: 53px;" border="1">
<tbody>
<tr style="height: 12px;">
<td style="width: 25%; text-align: center; height: 12px;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Nombre</span></strong></td>
<td style="width: 25%; text-align: center; height: 12px;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Tipo de baja</span></strong></td>
<td style="width: 25%; text-align: center; height: 12px;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Fecha</span></strong></td>
<td style="width: 25%; text-align: center; height: 12px;"><strong><span style="font-family: calibri, sans-serif; font-size: 10pt;">Causas</span></strong></td>
</tr>
<tr style="height: 10px;">
<td style="width: 25%; height: 10px;">&nbsp;</td>
<td style="height: 10px; width: 25%;">
<p style="text-align: justify;">Temporal ( ) Definitiva( )</p>
</td>
<td style="width: 25%; height: 10px;">&nbsp;</td>
<td style="width: 25%; height: 10px;">Economico( ) Familiar( ) Personal( ) Academico( )</td>
</tr>
<tr style="height: 21px;">
<td style="width: 25%; height: 21px;">&nbsp;</td>
<td style="width: 25%; height: 21px;">Temporal ( ) Definitiva( )</td>
<td style="width: 25%; height: 21px;">&nbsp;</td>
<td style="width: 25%; height: 21px;">Economico( ) Familiar( ) Personal( ) Academico( )</td>
</tr>
<tr style="height: 21px;">
<td style="width: 25%; height: 10px;">&nbsp;</td>
<td style="width: 25%; height: 10px;">Temporal ( ) Definitiva( )</td>
<td style="width: 25%; height: 10px;">&nbsp;</td>
<td style="width: 25%; height: 10px;">Economico( ) Familiar( ) Personal( ) Academico( )</td>
</tr>
</tbody>
</table>
<p><strong><span style="font-family: calibri, sans-serif;">IV. ALUMNOS BECADOS</span></strong></p>
<table style="border-collapse: collapse; width: 100%; height: 75px;" border="1">
<tbody>
<tr style="height: 45px;">
<td style="width: 13.8525%; text-align: center; height: 45px;"><span style="font-family: calibri, sans-serif;"><strong><span style="font-size: 10pt;">Numero de alumnos</span></strong></span></td>
<td style="width: 11.8032%; text-align: center; height: 45px;"><span style="font-family: calibri, sans-serif;"><strong><span style="font-size: 10pt;">Hombre</span></strong></span></td>
<td style="width: 9.34428%; text-align: center; height: 45px;"><span style="font-family: calibri, sans-serif;"><strong><span style="font-size: 10pt;">Mujer</span></strong></span></td>
<td style="width: 25.1913%; text-align: center; height: 45px;"><span style="font-family: calibri, sans-serif;"><strong><span style="font-size: 10pt;">Nombre de la Beca</span></strong></span></td>
<td style="width: 39.8087%; text-align: center; height: 45px;"><span style="font-family: calibri, sans-serif;"><strong><span style="font-size: 10pt;">Tipo</span></strong></span></td>
</tr>
<tr style="height: 43px;">
<td style="width: 13.8525%; height: 10px;">&nbsp;</td>
<td style="width: 11.8032%; height: 10px;">&nbsp;</td>
<td style="width: 9.34428%; height: 10px;">&nbsp;</td>
<td style="width: 25.1913%; height: 10px;">&nbsp;</td>
<td style="width: 39.8087%; height: 10px;"><strong><span style="font-size: 10pt;">Federal( ) Estatal( ) Local( ) </span></strong><strong><span style="font-size: 10pt;">Institucional( )</span></strong></td>
</tr>
<tr style="height: 21px;">
<td style="width: 13.8525%; height: 10px;">&nbsp;</td>
<td style="width: 11.8032%; height: 10px;">&nbsp;</td>
<td style="width: 9.34428%; height: 10px;">&nbsp;</td>
<td style="width: 25.1913%; height: 10px;">&nbsp;</td>
<td style="width: 39.8087%; height: 10px;">&nbsp;</td>
</tr>
<tr style="height: 21px;">
<td style="width: 13.8525%; height: 10px;">&nbsp;</td>
<td style="width: 11.8032%; height: 10px;">&nbsp;</td>
<td style="width: 9.34428%; height: 10px;">&nbsp;</td>
<td style="width: 25.1913%; height: 10px;">&nbsp;</td>
<td style="width: 39.8087%; height: 10px;">&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
 </textarea>
<input  name="Codigor" type="hidden" value="ITESCO-AC-PO-008-05">
<input  name="Titulor" type="hidden" value="Reporte Parcial de Tutorias">
<input  name="Grupor" type="hidden" value="<?php echo $_GET['g']; ?>">
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
