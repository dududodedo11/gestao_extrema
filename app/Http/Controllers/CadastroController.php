<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CadastroController extends Controller
{
    public function index() {
        return view('site.cadastro');
    }

    public function cadastrar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'sobrenome' => 'max:40',
            'nome_empresa' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'nomw.min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome só pode ter no máximo 40 caracteres',
            'sobrenome.max' => 'O campo sobrenome só pode ter no máximo 40 caracteres',
            'nome_empresa.max' => 'O campo de "nome da empresa" só pode ter no máximo 50 caracteres',
            'email.email' => 'O campo e-mail deve ser válido',
            'email.unique' => 'O e-mail inserido já existe',
            'password.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        User::create($request->all());

        return redirect()->route('site.login');
    }
}
