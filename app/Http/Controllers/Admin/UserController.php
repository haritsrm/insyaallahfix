<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use Alert;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show()
    {
        $data = User::all();
        return view('admin.showuser')->with('val', $data);
    }

    public function suspend($id)
    {
        $user = User::find($id);
        $user->suspend(1);
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->route('admin/showuser');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->suspend(0);
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->route('admin/showuser');
    }
}
