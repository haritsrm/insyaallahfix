<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Barang;
use Session;
use Alert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
                'stock' => $req->input('stock')
            ]);
            Alert::success('Sukses!', 'Barang berhasil diinputkan');
            if ($req->input('type') == 'barang'){
                return redirect()->route('admin/newbarang');
            }else{
                return redirect()->route('admin/newruangan');
            }
        }else{
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
                'stock' => $req->input('stock')
            ]);
        }else{
            $barang = Barang::find($id)->update([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => Barang::find($id)->pict,
                'description' => $req->input('description'),
                'stock' => $req->input('stock')
            ]);
        }
        Alert::success('Sukses!', 'Barang berhasil diupdate');
        return redirect()->route('admin/showbarang');
    }

    public function delete($id)
    {
        Barang::destroy($id);
        Alert::success("Berhasil hapus barang", "Berhasil!");
        return redirect()->route('admin/showbarang');
    }
}