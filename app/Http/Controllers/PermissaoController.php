<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permissao;
use App\Models\Legislacao;
use App\Models\Documento;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    public function permissaoPage(){
        if(Auth::user()->is_admin == 1){

            $permissoes = Permissao::all();

            return view('layouts.dashboard.permissoes', ['permissoes' => $permissoes]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addPermissaoPage(){
        if(Auth::user()->is_admin == 1){

            $permissoes = Permissao::all();
            $legislacoes = Legislacao::all();
            $documentos = Documento::all();
            $users = User::all();

            return view('layouts.dashboard.addpermissao', 
            ['permissoes' => $permissoes,
            'legislacoes' => $legislacoes,
            'documentos' => $documentos,
            'users' => $users
            ]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addPermissao(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $permissao = [];
                $permissao['permissao_tipo'] = $request->permissao_tipo;
                $permissao['permissao_justificativa'] = $request->permissao_justificativa;
                $permissao['permissao_permitido_em'] = $request->permissao_permitido_em;
                $permissao['permissao_legislacao_id'] = $request->permissao_legislacao_id;
                $permissao['permissao_funcionario_id'] = $request->permissao_funcionario_id;
                $permissao['permissao_documento_id'] = $request->permissao_documento_id;
                
                if(Permissao::create($permissao)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/permissoes');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    //Página que usuário seleciona permissão
    public function selecionarPermissaoPage(){
        if(Auth::user()){

            $documentos = Documento::all();

            return view('layouts.permissoes.selecionar', ['documentos' => $documentos]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function solicitarPermissaoPage($id){
        if(Auth::user()){

            $documentos = Documento::findOrFail($id);

            return view('layouts.permissoes.solicitar', ['documentos' => $documentos, 'id' => $id]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
