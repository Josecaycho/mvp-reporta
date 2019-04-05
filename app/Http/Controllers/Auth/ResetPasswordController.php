<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showreset(User $user)
    {
        return view('auth.passwords.reset', compact('user'));
    }

    public function updated(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->firstOrFail();
        $user->password = bcrypt($credentials['password']);
        $user->save();

        return redirect()->route('admin.login')->with('status', 'Contraseña Reseteada. Ya puedes ingresar.');
    }

    public function reset(Request $request)
    {
        $row = User::where('email', $request->only('email'))->firstOrFail();

        $transport = (new \Swift_SmtpTransport('secure203.servconfig.com', 587,'tls'))->setUsername('noreply@ncom.pe')->setPassword('n0r3plYNc0mP3');
        
        $view = view('auth.layouts.email', ['row' => $row]);
        
        $body = (string) $view;

        $mailer = (new \Swift_Mailer($transport));
        
        $message = (new \Swift_Message('Resetear Contraseña'))
        ->setFrom(array('noreply@ncom.pe' => 'Administrador - Resetear Contraseña'))
        ->setTo(array($row->email => $row->name))
        ->setBody($body, 'text/html');

        $result = $mailer->send($message);

        return redirect()->back()->with('status', 'Correo Enviado.');
    }
}
