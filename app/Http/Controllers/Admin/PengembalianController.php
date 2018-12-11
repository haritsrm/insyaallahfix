<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Acc;
use App\Peminjaman;
use App\Barang;
use Session;
use Alert;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PengembalianController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Acc::orderBy('created_at', 'desc')->get();
        $now = Carbon::now('Asia/Jakarta');
        return view('admin.showpengembalian')->with('val', $data)
                                             ->with('now', $now);
    }

    public function kembali($id)
    {
        $x = Acc::find($id);
        $x->update([
            'activate' => 3,
        ]);
        $c = Peminjaman::all()->where('kode', $x->kode);
        foreach ($c as $d){
            $stok = Barang::find($d->barang_id)->stock;
            $newstok = $stok + $d->jumlah;
            Barang::find($d->barang_id)->update([
                'stock' => $newstok
            ]);
        }
        Alert::success('Pengembalian Sukses!', 'Pengembalian barang berhasil');
        return redirect()->route('admin/pengembalian');
    }
}