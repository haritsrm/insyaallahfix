<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use PDF;
use App\Acc;
use Session;
use Illuminate\Support\Facades\Auth;

class PdfController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");
        
        $data = Acc::find($id);
        $pdf = PDF::loadView('pdf.peminjaman', compact('data', 'id'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->download('Bukti Peminjaman '.Auth::user()->name.'.pdf');
    }
}