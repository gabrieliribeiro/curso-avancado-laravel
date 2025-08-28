<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //realizar a validação dos dados

        $regras = [
            'name' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'name.unique' => 'O nome informado já existe.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'motivo_contatos_id.required' => 'O campo motivo do contato é obrigatório.',
            'mensagem.required' => 'O campo mensagem é obrigatório.',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 2000 caracteres.'
        ];

        $request->validate($regras, $feedback); ;

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
