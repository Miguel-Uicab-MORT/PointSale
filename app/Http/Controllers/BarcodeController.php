<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use PDF;

class BarcodeController extends Controller
{
    public function printBarcode()
    {
        $productos = Producto::all();

        $pdf = PDF::loadview('print.barcode', compact('productos'));

        return $pdf->stream();
    }
}
