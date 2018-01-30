<?php

namespace Drstock\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    $pdf = PDF::loadView('pdf.invoice_achat', $data);
return $pdf->download('invoice.pdf');
}
