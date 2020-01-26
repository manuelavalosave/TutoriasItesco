<?php
// make sure to see way stuff may not be happening

// some functions us in this class has been depreciated and will give errors/warnings

//ini_set('display_errors',1); 
 //error_reporting(E_ALL);


// var_dump $_POST data
if (isset($_POST['var_dump']))
{
    header('content-type: text/plain');
    var_dump($_POST);
    exit();
}

// include the fpdf class to create PDF files
require('html2pdf/html2fpdf.php');
$pdf        =   new HTML2FPDF();
$pdf->AddPage();
$pdf->WriteHTML($_POST['elm1']);
$pdf->Output('created_pdf/sample.pdf');
echo "PDF file is generated successfully!<br/>Solicitation removed by RQuadling 8th July 2011";
