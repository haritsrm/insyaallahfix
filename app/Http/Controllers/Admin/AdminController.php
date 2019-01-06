<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Alert;
use App\Admin;
use App\Peminjaman;
use App\Acc;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = \App\Barang::all();
        return view('admin.admin')
                                ->with('data', $barangs);
    }

    public function setting(){
        return view('admin.admin');
    }

    public function update(Request $req, $id){
        $admin = Admin::find($id);
        $admin->name = $req->name;
        $admin->email = $req->email;
        if ($req->password!='') {
            $admin->password = Hash::make($req->password);
        }
        $admin->save();

        Alert::success('Memperbarui data admin!', 'Berhasil');
        return redirect()->back();
    }

    public function pelanggan()
    {
        $members = User::all();

        return view('admin.showuser')
        ->with('members', $members);

    }

    public function new()
    {
        return view('admin.newadmin');
    }

    public function create(Request $req)
    {
        $admin = Admin::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'no_tlp' => $req->input('no_tlp'),
            'password' => bcrypt($req->input('password')),
            'super' => 0,
            'suspend' => 0,
        ]);
            Alert::success('Register Success!', 'Berhasil tambah admin');
            return redirect()->route('admin/new');
    }

    public function show()
    {
        $data = Admin::all();
        return view('admin.showadmin')->with('val', $data);
    }
    
    public function deletePelanggan($id)
    {
        User::find($id)->delete();

        Alert::success('Menghapus '.$category->name.' dari daftar!', 'Berhasil');
        return redirect()->back();
    }

    public function suspend($id)
    {
        $user = Admin::find($id);
        $user->update([
            'suspend' => 1,
        ]);
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->route('admin/showadmin');
    }

    public function activate($id)
    {
        $user = Admin::find($id);
        $user->update([
            'suspend' => 0,
        ]);
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->back()   ;
    }

}
