<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Acc;
use App\Peminjaman;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Alert;
use App\Log;
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
        $acc = Acc::find($id);
        $acc->update([
            'activate' => 1,
            'acc_by' => Auth::user()->id,
        ]);
        Log::create([
            'status' => 'success',
            'message' => 'Acc peminjaman, '.$acc->kode,
            'user' => Auth::user()->name,
        ]);
        Alert::success('Acc Success!', 'Peminjaman berhasil di acc');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function terima($id)
    {
        $acc = Acc::find($id);
        $acc->update([
            'activate' => 2,
        ]);
        Log::create([
            'status' => 'success',
            'message' => 'Terima bukti peminjaman, '.$acc->kode,
            'user' => Auth::user()->name,
        ]);
        Alert::success('Success!', 'Bukti telah diterima!');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function block($id)
    {
        $acc = Acc::find($id);
        $acc->update([
            'activate' => 4,
        ]);
        Log::create([
            'status' => 'success',
            'message' => 'Blokir peminjaman, '.$acc->kode,
            'user' => Auth::user()->name,
        ]);
        Alert::success('Blocked!', 'Peminjaman di blokir');
        return redirect()->route('admin/verifpeminjaman');
    }
}