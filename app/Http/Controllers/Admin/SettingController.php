<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.setting')
        ->with('data', $x);
    }

    public function changePassword(Request $req)
    {
        $current_password = Auth::Admin()->password;           
        if(Hash::check($req->input('pass'), $current_password))
        {
            if($req->input('newpassagain') == $req->input('newpass')){
                $cp = Admin::find(Auth::user()->id);
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
                'message' => 'Gagal mengubah password',
                'user' => Auth::user()->name,
            ]);
            Alert::error("Oops..". "Harap isi field!");
            return redirect()->back();
        }
    }

    public function changeProfile(Request $req)
    {
        if(!Auth::user()->suspend == 0){
            if($req->input('name') == '' || $req->input('email') == '' || $req->input('no_tlp') == ''){
                Log::create([
                    'status' => 'error',
                    'message' => 'Gagal merubah data diri',
                    'user' => Auth::user()->name,
                ]);
                Alert::error("Error!", "Data tidak boleh kosong");
                return redirect()->back();
            }else{
                $cprofile = Admin::find(Auth::user()->id);
                $cprofile->update([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'no_tlp' => $req->input('no_tlp')
                ]);
                Log::create([
                    'status' => 'success',
                    'message' => 'Mengubah data diri',
                    'user' => Auth::user()->name,
                ]);
                Alert::success("Berhasil!", "Berhasil merubah profil");
                return redirect()->back();
            }
        }else{
            if($req->input('name') == '' || $req->input('email') == '' || $req->input('no_tlp') == ''){
                Log::create([
                    'status' => 'error',
                    'message' => 'Gagal merubah data diri',
                    'user' => Auth::user()->name,
                ]);
                Alert::error("Error!", "Data tidak boleh kosong");
                return redirect()->back();
            }else{
                $cprofile = Admin::find(Auth::user()->id);
                $cprofile->update([
                    'name' => $req->input('name'),
                    'email' => $req->input('email'),
                    'no_tlp' => $req->input('no_tlp'),
                ]);
                Log::create([
                    'status' => 'success',
                    'message' => 'Mengubah data diri',
                    'user' => Auth::user()->name,
                ]);
                Alert::success("Berhasil!", "Berhasil merubah profil");
                return redirect()->back();
            }
        }
    }
}