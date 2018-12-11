<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Acc;
use App\Peminjaman;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Alert;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Acc::orderBy('created_at', 'desc')->get();
        return view('admin.showpeminjaman')->with('val', $data);
    }

    public function acc($id)
    {
        Acc::find($id)->update([
            'activate' => 1,
            'acc_by' => Auth::user()->id,
        ]);
        Alert::success('Acc Success!', 'Peminjaman berhasil di acc');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function terima($id)
    {
        Acc::find($id)->update([
            'activate' => 2,
        ]);
        Alert::success('Success!', 'Bukti telah diterima!');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function block($id)
    {
        Acc::find($id)->update([
            'activate' => 4,
        ]);
        Alert::success('Blocked!', 'Peminjaman di blokir');
        return redirect()->route('admin/verifpeminjaman');
    }
}