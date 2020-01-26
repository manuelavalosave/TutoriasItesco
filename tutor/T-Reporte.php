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
                  	<form method="POST" action="../PITA-2.0.1/RegistroFormatoPDF.php">
                  	 <textarea name="GuardarPlanDeTrabajo">
         <p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><u><span style="font-size: 14.0pt; line-height: 115%; background: silver;">REPORTE FINAL DE TUTORIAS</span></u></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">Grupo: <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periodo:<u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp; &nbsp; &nbsp;fecha: ________________</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">No. de estudiantes que inician el semestre: _______</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">I. ESTUDIANTES IRREGULARES (AL INICIAR EL SEMESTRE)</span></strong></p>
<table class="MsoNormalTable" style="width: 451.95pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody id="tabla123">
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Nombre</span></strong></p>
</td>
<td style="width: 144.05pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Materias que adeuda</span></strong></p>
</td>
<td style="width: 163.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Resultados al finalizar el semestre</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr style="height: 9.3pt;">
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 0.0001pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">II. ESTUDIANTES CON PROBLEMAS</span></strong></p>
<table class="MsoNormalTable" style="width: 451.95pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Nombre</span></strong></p>
</td>
<td style="width: 144.05pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Tipo de problema</span></strong></p>
</td>
<td style="width: 163.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Seguimiento</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 144.05pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 144.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">III. BAJAS Y DESERCI&Oacute;N DURANTE EL SEMESTRE</span></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 4.0pt; line-height: 115%;">&nbsp;</span></p>
<table class="MsoNormalTable" style="width: 451.95pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Nombre</span></strong></p>
</td>
<td style="width: 70.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Tipo de baja</span></strong></p>
</td>
<td style="width: 70.9pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Fecha</span></strong></p>
</td>
<td style="width: 6.0cm; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Causas</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.9pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 6.0cm; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.9pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 6.0cm; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 70.9pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 6.0cm; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; background: silver;">IV. ALUMNOS BECADOS</span></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 4.0pt; line-height: 115%;">&nbsp;</span></p>
<table class="MsoNormalTable" style="width: 451.95pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 11.8pt;">
<td style="width: 140.1pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Nombre</span></strong></p>
</td>
<td style="width: 148.0pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Tipo de beca</span></strong></p>
</td>
<td style="width: 163.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Observaciones</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 148.0pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 148.0pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 140.1pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 148.0pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 163.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">V. VISITAS REALIZADAS</span></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 4.0pt; line-height: 115%;">&nbsp;</span></p>
<table class="MsoNormalTable" style="width: 451.95pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 110.5pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">N&uacute;mero de estudiantes que asistieron</span></strong></p>
</td>
<td style="width: 106.4pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Nombre de la empresa</span></strong></p>
</td>
<td style="width: 118.2pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Fecha</span></strong></p>
</td>
<td style="width: 116.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Observaciones</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 110.5pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 106.4pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 118.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 116.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 110.5pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 106.4pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 118.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 116.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 110.5pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 106.4pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 118.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 116.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">VI. ACTIVIDADES EXTRACLASE</span></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 4.0pt; line-height: 115%;">&nbsp;</span></p>
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 93.15pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Actividad (Curso, conferencia, taller, etc.)</span></strong></p>
</td>
<td style="width: 87.1pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Impartido por</span></strong></p>
</td>
<td style="width: 92.2pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Fecha</span></strong></p>
</td>
<td style="width: 89.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">No. estudiantes participantes</span></strong></p>
</td>
<td style="width: 73.7pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: center; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 9.0pt;">Observaciones</span></strong></p>
</td>
</tr>
<tr>
<td style="width: 93.15pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 87.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 92.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 89.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 73.7pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 93.15pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 87.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 92.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 89.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 73.7pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 93.15pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 87.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 92.2pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 89.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
<td style="width: 73.7pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 8.0pt;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; background: silver;">VII. OBSERVACIONES Y RECOMENDACIONES GENERALES: (COMENTARIOS DE PROFESORES SOBRE CIRCUNSTANCIAS PRESENTADAS SOBRE EL SEMESTRE)</span></strong></p>
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 9.0pt;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 8.0pt;">&nbsp;</span></strong></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; background: silver;">VIII. OBSERVACIONES HECHAS POR LOS ESTUDIANTES DURANTE EL SEMESTRE</span></strong></p>
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 9.0pt;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 8.0pt;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; background: silver;">IX. INFORMACI&Oacute;N ADICIONAL</span></strong><strong><span style="font-size: 12.0pt;">&nbsp; </span></strong></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">Alumnos con promedio de:</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">100&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp; )</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">90&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp; )</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">80&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp; )</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">70&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp; )</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; background: yellow;">Alumnos reprobados con:</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; background: yellow;">1 asignatura&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; background: yellow;">2 asignaturas&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; background: yellow;">3 o m&aacute;s&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 14.0pt;">Promedio general del grupo: _______</span></strong></p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">Alumnos trabajando: __________</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">Tipo de empresa donde trabajan: __________________________________________________</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">Alumnos con oficio__________ Tipo _______________________________________________</p>
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">Alumnos emprendedores (que tengan empresa propia) ____ Tipo de empresa______________</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span style="font-size: 12.0pt; line-height: 115%; background: silver;">X. OBSERVACIONES Y COMENTARIOS DEL PROFESOR TUTOR PARA MEJORAR EL PROGRAMA DE TUTOR&Iacute;AS</span></strong></p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">&nbsp;</span></p>
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 9.0pt;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 436.0pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong>INSTRUCTIVO DE LLENADO</strong></p>
<p style="text-align: justify; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><strong>&nbsp;</strong></p>
<table class="MsoNormalTable" style="width: 100.0%; border-collapse: collapse; border: none; margin-left: 4.8pt; margin-right: 4.8pt;" border="1" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr style="height: 9.9pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">N&uacute;mero</span></strong></p>
</td>
<td style="width: 87.7%; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><strong><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">Descripci&oacute;n</span></strong></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">1</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el grupo asignado al profesor tutor</span></p>
</td>
</tr>
<tr style="height: 11.25pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">2</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el semestre que se reporta</span></p>
</td>
</tr>
<tr style="height: 9.75pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">3</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar la fecha en que se entrega el reporte</span></p>
</td>
</tr>
<tr style="height: 12.0pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">4</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar cuantos alumnos se inscribieron en el grupo</span></p>
</td>
</tr>
<tr style="height: 9.0pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">5</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar nombre y apellido de los alumnos que adeudan materias del semestre anterior al iniciar el semestre, as&iacute; como su situaci&oacute;n al finalizar el semestre.</span></p>
</td>
</tr>
<tr style="height: 11.25pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">6</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el nombre y apellido de alumnos con problemas de horario, enfermedades etc, as&iacute; como las acciones tomadas para resolverlos.</span></p>
</td>
</tr>
<tr style="height: 9.75pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">7</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar nombre y apellido de los alumnos que causaron baja durante el semestre, as&iacute; como tipo de baja, fecha y la causa de la baja.</span></p>
</td>
</tr>
<tr style="height: 11.25pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">8</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar los nombres y apellidos de los alumnos que tengan beca en el grupo asignado, tipo de beca y observaciones.</span></p>
</td>
</tr>
<tr style="height: 9.75pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">9</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el n&uacute;mero de estudiantes que asistieron a visitas durante el semestre, del grupo asignado, as&iacute; como el nombre de la empresa y la fecha en que asistieron.</span></p>
</td>
</tr>
<tr style="height: 9.75pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">10</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar las actividades extraclase a las que asistieron los estudiantes del grupo asignado, as&iacute; como por quien fue impartido, fecha, cuantos estudiantes participaron y observaciones al respecto.</span></p>
</td>
</tr>
<tr style="height: 8.25pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">11</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar observaciones o situaciones reportadas por los docentes durante el semestre escolar con respecto al grupo asignado en tutor&iacute;a.</span></p>
</td>
</tr>
<tr style="height: 10.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">12</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el promedio de calificaciones del grupo asignado en tutor&iacute;a.</span></p>
</td>
</tr>
<tr style="height: 8.25pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">13</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar las observaciones o situaciones reportadas durante el semestre por los estudiantes del grupo asignado en tutor&iacute;a.</span></p>
</td>
</tr>
<tr style="height: 6.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">14</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar el n&uacute;mero de alumnos con promedio de calificaciones de 10, 9, 8 y 7; n&uacute;mero de alumnos que trabajan y el tipo de empresa en que lo hacen, N&uacute;mero de alumnos con un oficio y de cual(es) se trata, n&uacute;mero de alumnos que tengan empresa propia y el tipo de empresa de que se trate.</span></p>
</td>
</tr>
<tr style="height: 6.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">15</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar los comentarios, observaciones y sugerencias del profesor tutor que permitan mejorar los trabajos en la ejecuci&oacute;n del programa de tutor&iacute;as.</span></p>
</td>
</tr>
<tr style="height: 6.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">16</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar nombre y firma del profesor tutor.</span></p>
</td>
</tr>
<tr style="height: 6.5pt;">
<td style="width: 12.3%; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;" align="center"><span style="font-size: 10.0pt; line-height: 115%; font-family: Arial, sans-serif;">17</span></p>
</td>
<td style="width: 87.7%; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt;" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 10.0pt; line-height: 115%;">Anotar nombre y firma del jefe de divisi&oacute;n.</span></p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify; margin: 0cm 0cm 10pt; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;">&nbsp;</p>
</textarea>
<input  name="Codigor" type="hidden" value="ITESCO-AC-PO-008-05">
<input  name="Titulor" type="hidden" value="Reporte Parcial de Tutorias">
</form>
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
          
           <div class="h2" style="color:#e74c3c">Docencia</div>

          
             <div class="card border-danger" style="margin-bottom: 20px;">
                <div class="card-header h3 text-light" style="background-color: #e74c3c">Plan de trabajo</div>
                <div class="card-body">
                  <?php if (!empty($plan)): ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/op_tutor_reporte.php?g=<?php echo $_GET['g']; ?>" method="POST">
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
  $rutaHTML = "../PITA-2.0.1/docs/html/".$_GET['g']."/".$plan['archivo'].".html";
$página_inicio = file_get_contents($rutaHTML);
echo $página_inicio;

}?>
</textarea>
<input  name="Codigo" type="hidden" value="ITESCO-AC-PO-008-04">
<input  name="Titulo" type="hidden" value="Plan de trabajo del Tutor">
<input  name="Grupo" type="hidden" value="<?php echo $_GET['g']; ?>">
</form>


                    
                </div>
            </div>
             <div class="card border-danger" style="margin-bottom: 20px;">

                <div class="card-header h3 text-light" style="background-color: #e74c3c">Reporte Parcial de Tutorias</div>
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
                            <p class="text-muted">"Aun no tiene ningún plan de trabajo..."</p>
                            
                    </form>
                    <?php endif ?>
                	    	<form method="POST" action="/PITA-2.0.1/GenerarPDF.php">
                  	 <textarea name="GuardarPlanDeTrabajo">
               <h1 class="MsoTitle" style="text-align: center;"><span style="font-family: arial, sans-serif;">REPORTE PARCIAL DE TUTORIAS</span><br /><strong><span style="font-size: 14.0pt; line-height: 115%; color: black;">Reporte No.__(<u>1</u>)_____</span></strong></h1>
<table style="border-collapse: collapse; width: 100%;" border="1">
  <?php foreach ($DTBUSER as $datos) {
    # code...
    ?>
<tbody>
<tr>
<td style="width: 66.6666%;" colspan="2" scope="rowgroup">Nombre: <?php echo $datos['nombre']; echo $datos['a_paterno']; echo $datos['a_materno']; ?></td>
<td style="width: 33.3333%;">Fecha:</td>
</tr>
<tr>
<td style="width: 33.3333%;">Grupo y semestres: <?php echo $datos['semestre'];?>º.<?php echo $datos['grupo'];?></td>
<td style="width: 33.3333%;">Carrera:<?php echo $datos['carrera'];?></td>
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
<tr>
<td style="width: 4.6119%;">&nbsp;</td>
<td style="width: 19.8173%;">&nbsp;</td>
<td style="width: 20.9133%;">&nbsp;</td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 4.6119%;">&nbsp;</td>
<td style="width: 19.8173%;">&nbsp;</td>
<td style="width: 20.9133%;">&nbsp;</td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 4.6119%;">&nbsp;</td>
<td style="width: 19.8173%;">&nbsp;</td>
<td style="width: 20.9133%;">&nbsp;</td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 4.6119%;">&nbsp;</td>
<td style="width: 19.8173%;">&nbsp;</td>
<td style="width: 20.9133%;">&nbsp;</td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
<tr>
<td style="width: 4.6119%;">&nbsp;</td>
<td style="width: 19.8173%;">&nbsp;</td>
<td style="width: 20.9133%;">&nbsp;</td>
<td style="width: 21.3242%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
<td style="width: 16.6667%;">&nbsp;</td>
</tr>
</tbody>
</table>
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
<tr>
<td style="width: 15.2055%;">&nbsp;</td>
<td style="width: 15.6164%;">&nbsp;</td>
<td style="width: 15.6164%;">&nbsp;</td>
<td style="width: 16.1644%;">&nbsp;</td>
<td style="width: 16.5753%;">&nbsp;</td>
<td style="width: 20.5479%;">&nbsp;</td>
</tr>
</tbody>
</table>
<p class="MsoNoSpacing" style="text-align: center; margin: 3.0pt 0cm 3.0pt 0cm;"><span style="font-size: 10.0pt; font-family: Arial, sans-serif;">&nbsp;</span></p>
<table class="MsoNormalTable" style="border-collapse: collapse; margin-left: 4.8pt; margin-right: 4.8pt;" border="0" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="width: 281.85pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" valign="top">
<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;">(19)</p>
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
<input  name="Titulo" type="hidden" value="Reporte Parcial de Tutorias">
<input  name="Grupo" type="hidden" value="<?php echo $_GET['g']; ?>">
</form>
          
                </div>
            </div>

            <div class="card border-danger">
                <div class="card-header h3 text-light" style="background-color: #e74c3c">Reportes</div>
                <div class="card-body">
                    <?php if(!empty($reportes)): ?>
                       <table class="table">
                        <thead class="text-white" style="background-color: #c0392b">
                            <th scope="col" class="text-center"># Reporte</th>
                            <th scope="col" class="text-center">Archivo</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center"></th>
                        </thead>
                        <tbody>
                            <?php foreach($reportes as $reporte): ?>
                                <tr class="celda">
                                    <th class="text-center"><?php echo $reporte['parcial'] ?></th>
                                    <td><i class="material-icons">description</i> <?php echo substr($reporte['archivo'], 0, 30).'...' ?></td>
                                    <?php if ($reporte['estado'] == '1'): ?>
                                    <td class="text-center text-muted"><span class="badge badge-secondary">No Revisado</span></td>
                                    <?php elseif($reporte['estado'] == '2'): ?>
                                    <td class="text-center text-success"><span class="badge badge-success">Revisado</span></td>
                                    <?php else: ?>
                                    <td class="text-center text-danger"><span class="badge badge-danger">Rechazado</span></td>
                                    <?php endif ?>
                                    <td class="text-right">
                                    <form name="rep-borrar<?php echo $reporte['parcial']?>" action="../app/op_tutor_reporte.php" method="POST">
                                       <a href="../docs/reportes/<?php echo $reporte['archivo']?>" target="_blank" class="btn btn-sm btn-outline-danger">Visualizar</a>
                                        <input name="delete2" class="btn btn-sm btn-outline-secondary" type="submit" value="Eliminar">
                                        <input name="name" type="text" value="<?php echo $reporte['archivo']?>" hidden>
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <p class="text-muted">"Aun no tiene ningún reporte..."</p>
                    <?php endif ?>
                    <hr>
                    <p class="text-danger">Subir archivos:</p>
                    <form name="reporte" enctype="multipart/form-data" action="../app/op_tutor_reporte.php" method="POST">
                       <div class="input-group" style="width:125px">
                           <span class="input-group-addon">Parcial:</span>
                           <input class="form-control" name="parcial" type="text" value="<?php echo $parcial ?>" readonly>
                       </div>
                       <br>
                        <div class="input-group">
                            <span class="input-group-addon">Archivo</span>
                            <input style="width: 75%" type="file" accept=".pdf" name="reporte" id="reporte" class="form-control">
                            <input class="btn btn-outline-secondary form-control text-right" type="submit" name="cargar2" value="Cargar">
                        </div>
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
