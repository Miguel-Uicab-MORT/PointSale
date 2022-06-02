<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarcodeController extends Controller
{
    public function printBarcode()
    {
        $productos = Producto::all();

        $pdf = PDf::loadview('print.barcode', compact('productos'));

        return $pdf->stream();
        //return view('print.barcode', compact('productos'));
    }
}
