<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Estante;
use App\Models\Prateleira;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PrateleiraController extends Controller
{

    public function prateleiraPage(){
        if(Auth::user()->is_admin == 1){

           return view('layouts.dashboard.prateleiras', ['prateleiras' => DB::table('prateleiras')->paginate(10)]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addPrateleiraPage(){
        if(Auth::user()->is_admin == 1){

            $prateleiras = Prateleira::all();
            $estantes = Estante::all();

            return view('layouts.dashboard.addprateleira', ['prateleiras' => $prateleiras],['estantes' => $estantes]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addPrateleira(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $prateleira = [];


                
                $prateleira['prateleira_numero'] = $request->prateleira_numero;
                $prateleira['prateleira_estante_id '] = $request->prateleira_estante_id;



                
                if(Prateleira::create($prateleira)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/prateleiras');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
