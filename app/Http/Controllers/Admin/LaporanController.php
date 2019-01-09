<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $req)
    {
        $data = \App\Acc::whereMonth('created_at','=',$req->month)->whereYear('created_at','=',$req->year)->latest('created_at')->get();
        return view('admin.showlaporan')->with('val', $data);
    }

    public function print(Request $req)
    {
        return redirect('/admina/printlaporan?month='.$req->month.'&year='.$req->year);
    }

    public function println(Request $req)
    {
        $data = \App\Acc::whereMonth('created_at','=',$req->month)->whereYear('created_at','=',$req->year)->latest('created_at')->get();
        view('pdf.laporan')->with('val', $data);
        $pdf = PDF::loadView('pdf.laporan', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Peminjaman.pdf');
    }

    public function barang(Request $req)
    {
        $barang = DB::table('peminjamen')
                     ->select(DB::raw('count(*) as barang_count, barang_id'))
                     ->whereMonth('created_at','=',$req->month)
                     ->whereYear('created_at','=',$req->year)
                     ->groupBy('barang_id')
                     ->get();
        return view('admin.showlaporanbarang')->with('val', $barang);
    }

    public function printbarang(Request $req)
    {
        return redirect('/admina/printlaporanbarang?month='.$req->month.'&year='.$req->year);
    }

    public function printlnbarang(Request $req)
    {
        $data = DB::table('peminjamen')
                    ->select(DB::raw('count(*) as barang_count, barang_id'))
                    ->whereMonth('created_at','=',$req->month)
                    ->whereYear('created_at','=',$req->year)
                    ->groupBy('barang_id')
                    ->get();        view('pdf.laporan')->with('val', $data);
        $pdf = PDF::loadView('pdf.laporanbarang', $data)->setPaper('a4', 'portrait');
        return $pdf->download('Laporan Barang.pdf');
    }
}
