<?php

namespace App\Services;

use Dompdf\Canvas;
use Dompdf\FontMetrics;

class PdfService
{
    public static function outputPageNumbers(Canvas $pdf, FontMetrics $fontMetrics, $PAGE_NUM, $PAGE_COUNT) {
        if ($PAGE_NUM > 1) {
            $font = $fontMetrics->getFont("helvetica", "bold");
            $current_page = $PAGE_NUM-1;
            $total_pages = $PAGE_COUNT-1;
            $pdf->text(522, 770, "Page: $current_page of $total_pages", $font, 10, array(0,0,0));
        }
    }
}
