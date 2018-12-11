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
    public function print(Request $req, $id)
    {
        $data = Acc::find($id);
        view('pdf.peminjaman')->with('data', $data);
        $pdf = PDF::loadView('pdf.peminjaman', $data)->setPaper('a4', 'potrait');
        return $pdf->download('Bukti Peminjaman '.Auth::user()->name.'.pdf');
    }
}