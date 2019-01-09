<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Hash;
use App\Log;

class SettingController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $x = Auth::user();
        return view('layouts.setting')
        ->with('data', $x);
    }

    public function changePassword(Request $req)
    {
        $current_password = Auth::User()->password;           
        if(Hash::check($req->input('pass'), $current_password))
        {
            if($req->input('newpassagain') == $req->input('newpass')){
                $cp = User::find(Auth::user()->id);
                $cp->password = Hash::make($req->input('newpass'));
                $cp->save();
                Log::create([
                    'status' => 'success',
                    'message' => 'Mengubah password akun',
                    'user' => Auth::user()->name,
                ]);
                Alert::success("Berhasil". "Berhasil merubah password!");
                return redirect()->back();
            }else{
                Log::create([
                    'status' => 'warning',
                    'message' => 'Password tidak sesuai',
                    'user' => Auth::user()->name,
                ]);
                Alert::warning("Password tidak sesuai", "Warning!");
                return redirect()->back();
            }
        }else{
            Log::create([
                'status' => 'error',
                'message' => 'Gagal mengubah password akun',
                'user' => Auth::user()->name,
            ]);
            Alert::error("Oops..". "Harap isi field!");
            return redirect()->back();
        }
    }

    public function changeProfile(Request $req)
    {
        if(!Auth::user()->suspend == 0){
            if($req->input('name') == '' || $req->input('email') == '' || $req->input('alamat') == '' || $req->input('no_tlp') == ''){
                Log::create([
                    'status' => 'error',
                    'message' => 'Gagal mengubah data akun',
                    'user' => Auth::user()->name,
                ]);
                Alert::error("Error!", "Data tidak boleh kosong");
                return redirect()->back();
            }else{
                $cprofile = User::find(Auth::user()->id);
                $cprofile->update([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'alamat' => $req->input('alamat'),
                    'no_tlp' => $req->input('no_tlp')
                ]);
                Log::create([
                    'status' => 'success',
                    'message' => 'Mengubah data akun',
                    'user' => Auth::user()->name,
                ]);
                Alert::success("Berhasil!", "Berhasil merubah profil");
                return redirect()->back();
            }
        }else{
            if($req->input('name') == '' || $req->input('email') == '' || $req->input('alamat') == '' || $req->input('no_tlp') == '' || $req->input('instansi') == '' || $req->input('jabatan') == ''){
                Log::create([
                    'status' => 'error',
                    'message' => 'Gagal mengubah data akun',
                    'user' => Auth::user()->name,
                ]);
                Alert::error("Error!", "Data tidak boleh kosong");
                return redirect()->back();
            }else{
                $cprofile = User::find(Auth::user()->id);
                $cprofile->update([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'alamat' => $req->input('alamat'),
                    'no_tlp' => $req->input('no_tlp'),
                    'instansi' => $req->input('instansi'),
                    'jabatan' => $req->input('jabatan')
                ]);
                Log::create([
                    'status' => 'success',
                    'message' => 'Mengubah data akun',
                    'user' => Auth::user()->name,
                ]);
                Alert::success("Berhasil!", "Berhasil merubah profil");
                return redirect()->back();
            }
        }
    }
}