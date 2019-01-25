<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Barang;
use Session;
use Alert;
use App\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

class BarangController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.newbarang');
    }

    public function show()
    {
        $data = Barang::all();
        return view('admin.showbarang')->with('val', $data);
    }

    public function create(Request $req)
    {
        $file = $req->file('pict');
        if($file){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(10000,1001238912).".".$ext;
            $file->move('uploads/', $newName);
            $barang = Barang::create([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => $newName,
                'description' => $req->input('description'),
                'stock' => $req->input('stock'),
                'pinjam' => $req->input('pinjam'),
            ]);
            Alert::success('Sukses!', 'Item berhasil diinputkan');
            if ($req->input('type') == 'barang'){
                Log::create([
                    'status' => 'success',
                    'message' => 'Menambahkan barang, '.$req->input('name'),
                    'user' => Auth::user()->name,
                ]);
                return redirect()->route('admin/newbarang');
            }else{
                Log::create([
                    'status' => 'success',
                    'message' => 'Menambahkan ruangan, '.$req->input('name'),
                    'user' => Auth::user()->name,
                ]);
                return redirect()->route('admin/newruangan');
            }
        }else{
            Log::create([
                'status' => 'warning',
                'message' => 'Gagal menambahkan barang, '.$req->input('name'),
                'user' => Auth::user()->name,
            ]);
            alert()->warning('Gambar tidak boleh kosong!','Warning!');
            return redirect()->back();
        }
        
    }

    public function update(Request $req, $id)
    {
        $file = $req->file('pict');
        if($file){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(10000,1001238912).".".$ext;
            $file->move('uploads/', $newName);
            $barang = Barang::find($id)->update([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => $newName,
                'description' => $req->input('description'),
                'stock' => $req->input('stock'),
                'pinjam' => $req->input('pinjam'),
            ]);
        }else{
            $barang = Barang::find($id)->update([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => Barang::find($id)->pict,
                'description' => $req->input('description'),
                'stock' => $req->input('stock'),
                'pinjam' => $req->input('pinjam'),
            ]);
        }
        Log::create([
            'status' => 'success',
            'message' => 'Mengubah barang, '.$req->input('name'),
            'user' => Auth::user()->name,
        ]);
        Alert::success('Sukses!', 'Item berhasil diupdate');
        return redirect()->back();
    }

    public function delete($id)
    {
        $barang = Barang::destroy($id);
        Log::create([
            'status' => 'success',
            'message' => 'Menghapus barang, '.$barang->name,
            'user' => Auth::user()->name,
        ]);
        Alert::success("Berhasil hapus item", "Berhasil!");
        return redirect()->back();
    }
}