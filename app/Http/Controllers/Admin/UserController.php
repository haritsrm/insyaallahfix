<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Log;
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
        $user->update([
            'suspend' => 1,
        ]);
        Log::create([
            'status' => 'success',
            'message' => 'Suspend akun, '.$user->name,
            'user' => Auth::user()->name,
        ]);
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->route('admin/show');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->update([
            'suspend' => 0,
        ]);
        Log::create([
            'status' => 'success',
            'message' => 'Activasi akun, '.$user->name,
            'user' => Auth::user()->name,
        ]);
        Alert::success('Sukses!', 'Berhasil activate akun');
        return redirect()->route('admin/show');
    }
}
