<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Auth;

use App\Peminjaman;
use App\Acc;
use App\Barang;
use App\Log;

class PeminjamanController extends Controller
{
    public function verifikasi()
    {
        $carts = \App\Cart::where('id_user', Auth::user()->id)->get();
        return view('pinjam.index')->with('carts', $carts);
    }

    public function pinjam(Request $req)
    {
        $kode=1;
        if(count(\App\Peminjaman::all())!==0)
        {
            $kode+=\App\Peminjaman::latest()->first()->kode;
        }
        $carts = \App\Cart::where('id_user', Auth::user()->id)->get();
        foreach($carts as $cart){
            $stok = Barang::find($cart->id_barang)->stock;
            $newstok = $stok - $cart->quantity;
            Peminjaman::create([
                'kode' => $kode,
                'user_id' => Auth::user()->id,
                'tgl_pinjam' => $req->input('tgl_pinjam'),
                'tgl_kembali' => $req->input('tgl_kembali'),
                'barang_id' => $cart->id_barang,
                'jumlah' => $cart->quantity,
            ]);
            Barang::find($cart->id_barang)->update([
                'stock' => $newstok,
            ]);
        }
        $carts = \App\Cart::where('id_user', Auth::user()->id)->delete();
        Acc::create([
            'kode' => $kode,
            'activate' => 0, 
        ]);
        Log::create([
            'status' => 'info',
            'message' => 'Meminjam barang, '.$kode,
            'user' => Auth::user()->name,
        ]);
        Alert::info('Harap menunggu persetujuan admin','Wait..');
        return redirect('pinjamanku');
    }

    public function pinjamanku()
    {
        $peminjaman = \App\Acc::all();

        return view('pinjamanku');
    }
}
