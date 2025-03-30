<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Voucher;

class PdfService
{
    public function generateVoucher(Voucher $voucher)
    {
        $pdf = PDF::loadView('vouchers.voucher', compact('voucher'));

        // Retorna el archivo descargable con el ID correcto
        return $pdf->download("voucher_{$voucher->id}.pdf");
    }
}
