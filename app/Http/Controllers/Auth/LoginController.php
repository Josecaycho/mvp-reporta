<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->firstOrFail();
        
        if ($user->accepted) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard.index');
            } else {
                return redirect()->route('admin.login')->with('status', 'Credenciales incorrectas.');
            }
        } else {
            return redirect()->route('admin.login')->with('status', 'Usuario no aprobado.');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect('/admin/login');
    }
}
