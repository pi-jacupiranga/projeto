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
        if(Auth::user()){
            // VALIDA DADOS 
            // SE VALIDOS 
                $permissao = [];
                $permissao['permissao_funcionario_id'] = $request->permissao_funcionario_id;
                $permissao['permissao_documento_id'] = $request->permissao_documento_id;
                $permissao['permissao_status'] = $request->permissao_status;
                
                if(Permissao::create($permissao)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return view('layouts.dashboard.index', ['msg' => "Permissão Solicitada."]);
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

    public function pendentesPermissaoPage(){
        if(Auth::user()->is_admin == 1){

            $permissoes = Permissao::all();

            return view('layouts.permissoes.pendentes', ['permissoes' => $permissoes]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function decidirPermissaoPage($id){
        if(Auth::user()->is_admin == 1){

            $permissao = Permissao::findOrFail($id);
            $legislacoes = Legislacao::all();

            return view('layouts.permissoes.decidir', 
            [
            'permissao' => $permissao,
            'id' => $id,
            'legislacoes' => $legislacoes,
            ]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function updatePermissao(Request $request){

        Permissao::findOrFail($request->id)->update($request->all());

        return view('layouts.dashboard.index', ['msg' => "Permissão Solicitada."]);
    }
}
