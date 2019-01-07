<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Alert;

class AdminLoginController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    protected function guard(){
        return Auth::guard('admin');
    }
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated(Request $request, $admin){
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'suspend' => 0], $request->remember)) {

            Alert::success('Here your dashboard!', 'Welcome back Admin');
            return redirect()->route('admin.home');
        }
        else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'suspend' => 1], $request->remember))
        {
            Auth::guard('admin')->logout();
            return redirect()->back()->withErrors(['suspend' => 'This account has been suspended!']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    //protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
