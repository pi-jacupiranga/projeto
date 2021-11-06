<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estante;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstanteController extends Controller
{
    public function estantePage(){
        if(Auth::user()->is_admin == 1){

           return view('layouts.dashboard.estantes', ['estantes' => DB::table('estantes')->paginate(10)]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addEstantePage(){
        if(Auth::user()->is_admin == 1){
            $users = User::all();
            return view('layouts.dashboard.addestante');
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addEstante(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $estante = [];
                
                $estante['estante_numero'] = $request->estante_numero;
                
                if(Estante::create($estante)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/estantes');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


}
