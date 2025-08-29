<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {   
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválido(s)';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para acessar a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];


        $request->validate($regras, $feedback);

        //Recuperar os dados do formulário (usuário e senha)
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Inicial o Model User
        $user = new User();
        $usuario = $user->where('email', '=',$email)
            ->where('password','=', $password)
            ->get()
            ->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['id'] = $usuario->id;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(Request $request){
        echo 'Sair';
        session_destroy();
        return redirect()->route('site.index');
    }
}
