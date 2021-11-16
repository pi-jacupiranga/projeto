<?php

namespace App\Http\Controllers;

use App\Models\Legislacao;
use App\Models\Permissao;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LegislacaoController extends Controller
{
    public function legislacaoPage(){
        if(Auth::user()->is_admin == 1){

            $legislacoes = Legislacao::all();

            return view('layouts.dashboard.legislacoes', ['legislacoes' => $legislacoes]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addLegislacaoPage(){
        if(Auth::user()->is_admin == 1){

            $legislacoes = Legislacao::all();

            return view('layouts.dashboard.addlegislacao', ['legislacoes' => $legislacoes]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addLegislacao(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $legislacao = [];
                $legislacao['legislacao_nome'] = $request->legislacao_nome;
                
                if(Legislacao::create($legislacao)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/legislacoes');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
