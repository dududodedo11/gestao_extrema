<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('site.login');
    }

    public function logar(Request $request) {
        $regras = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $feedback = [
            'email.required' => 'O campo e-mail é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'email.email' => 'O campo e-mail deve ser válido',
        ];

        $request->validate($regras, $feedback);

        $autheticated = Auth::attempt($request->only('email', 'password'));

        if($autheticated == true) {
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login')->withErrors(['credenciais' => 'E-mail ou senha incorretos']);
        };
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('site.login');
    }
}
