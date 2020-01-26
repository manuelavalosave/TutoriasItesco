<?php
session_start();


require_once 'app/GuardarDatos.php';
//require('./Pdf/tabla.php');
/*
 ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  /* ...
   Resto del código que genera el PDF
     ... */
  /* Limpiamos la salida del búfer y lo desactivamos */
  /*
  ob_end_clean();
$pdf=new PDF_HTML_Table('L','mm','A4',0);

$pdf->AddPage();
$pdf->SetFont('Arial','',12);


$pdf->WriteHTML($_POST['GuardarPlanDeTrabajo']);
$pdf->Output();
*/
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once './dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba



// Instanciamos un objeto de la clase DOMPDF.

$pdf = new Dompdf();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper('A4','landscape');
//$pdf->set_paper(array(0,0,104,250));

 $html="<html>
<head>
<meta charset='utf-8'>


  <style>
   @page { margin: 180px 50px; }
   @Contador {content-incl = page}

    #header {  position: fixed; left: 0px; top: -150px;  right: 0px;   text-align: center;  height: 90px;}
 
    #footer {  position: fixed; left: 0px; bottom: -150px; right: 0px;  height: 60px;  }
    #header .page:after { content: 'Paginas ' counter(page, decimal) ' de ' counter(page, decimal); 
   
}
letrasP{
	margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;
}
   #header .contadorXD:after { content: counters(page,'.')'';  }
   
    table {
           width:100%;
       }

@media screen and (max-width: 600px) {
       table {
           width:100%;
       }
       thead {
           display: none;
       }
       tr:nth-of-type(2n) {
           background-color: inherit;
       }
       tr td:first-child {
           background: #f0f0f0;
           font-weight:bold;
           font-size:1.3em;
       }
       tbody td {
           display: block;
           text-align:center;
       }
       tbody td:before {
           content: attr(data-th);
           display: block;
           text-align:center;
       }

}


  </style>
 

<body>
 
  <div id='header'>
    <div align='center'>
<table class='MsoNormalTable' style='border-collapse: collapse; border: none;' border='1' cellspacing='0' cellpadding='0'>
<tbody>
<tr style='height: 28.15pt;'>
<td style='width: 112.7pt; border: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;' rowspan='3' valign='top'>
<p style='margin: 0cm 0cm 0.0001pt; text-align: center; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;' align='center'><span ><img src='logo-itesco.png' width='85' height='88' /></span></p>
</td>
<td style='width: 384.3pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;' rowspan='3'>
<p style='margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: 115%; font-size: 11pt; font-family: Calibri, sans-serif;'><strong><span style='font-size: 12.0pt; line-height: 115%; font-family: Arial, sans-serif;'>Nombre del formato: ".$_POST['Titulo']."</span></strong></p>
</td>
<td style='width: 190.35pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;'>
<p style='margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;'><strong><span style='font-size: 12.0pt; font-family: Arial, sans-serif;'>C&oacute;digo: ".$_POST['Codigo']."</span></strong></p>
</td>
</tr>
<tr style='height: 20.0pt;'>
<td style='width: 190.35pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;'>
<p style='margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;'><strong><span style='font-size: 12.0pt; font-family: Arial, sans-serif;'>Revisi&oacute;n: 0</span></strong></p>
</td>
</tr>
<tr style='height: 23.85pt;'>
<td style='width: 190.35pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;'>
<p style='margin: 0cm 0cm 0.0001pt; text-align: justify; line-height: normal; font-size: 11pt; font-family: Calibri, sans-serif;'><strong><span class='page' style='font-size: 12.0pt; font-family: Arial, sans-serif;'> </span></strong></p>
</td>
</tr>
</tbody>
</table>
</div>
  </div>
  <div id='footer'>
  <div class='letrasP'><span style='float:right; font-size: 8.0pt;margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;'> Rev. 0 </span> ITESCO-AC-PO-008-04</div>

  
  </div>
 <div id='content'>
  ".$_POST['GuardarPlanDeTrabajo']."
</div>
</body>
</html>";


 




// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();
$output = $pdf->output();
$nombredelarchivo = str_replace(" ", "_", $_POST['Titulo']);
$carpeta = "../PITA-2.0.1/docs/planificacion/".$_POST['Grupo']."";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$file_to_save = "../PITA-2.0.1/docs/planificacion/".$_POST['Grupo']."/".$nombredelarchivo.".pdf";
file_put_contents($file_to_save, $output);

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="'.$nombredelarchivo.'.pdf"');
header('Content-Transfer-Encoding: binary');

readfile($file_to_save);

$rutaHTML = "../PITA-2.0.1/docs/html/".$_POST['Grupo']."/".$nombredelarchivo.".html";
$carpeta = "../PITA-2.0.1/docs/html/".$_POST['Grupo']."";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
$generadorHTML = fopen ( "$rutaHTML", 'w+' );//abro o genero archivo *ruta relativa
fwrite ($generadorHTML, $_POST['GuardarPlanDeTrabajo']);//escribo el contenido
fclose($generadorHTML);//cierro el archivo

$GuardarBD = Insertar_Formatos_Tutor($nombredelarchivo,$_POST['Grupo']);
header('Location:../tutor/T-Reporte.php?a=1&g='.$_GET['g'].'');
function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}

?>

