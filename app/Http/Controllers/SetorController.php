<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Setor;

class SetorController extends Controller
{
    //

    public function setorPage(){
        if(Auth::user()->is_admin == 1){
            return view('layouts.dashboard.setores');
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addSetorPage(){
        if(Auth::user()->is_admin == 1){
            $users = User::all();
            return view('layouts.dashboard.addsetor', ['users' => $users]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addSetor(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $setor = [];
                
                $setor['setor_nome'] = $request->setor_nome;
                $setor['setor_local'] = $request->setor_local;
                $setor['setor_funcionario_responsavel_id'] = $request->setor_funcionario_responsavel_id;
                
                if(Setor::create($setor)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE SETORES
                    return redirect('/dashboard/setores');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
