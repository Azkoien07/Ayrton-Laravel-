<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Voucher;

class PdfServices
{
    public function generateVoucher(Voucher $voucher)
    {
        $pdf = PDF::loadView('vouchers.voucher', compact('voucher'));

        
        return $pdf->download("voucher_{$voucher->id}.pdf");
    }
}
