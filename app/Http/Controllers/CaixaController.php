<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prateleira;
use App\Models\Caixa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function caixaPage(){
        if(Auth::user()->is_admin == 1){

            //Passando para conseguir acessar tabela estante porque não tem foreign key
            $prateleiras = Prateleira::all();

           return view('layouts.dashboard.caixas', ['caixas' => DB::table('caixas')->paginate(10)],['prateleiras' => $prateleiras]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addCaixaPage(){
        if(Auth::user()->is_admin == 1){

            $prateleiras = Prateleira::all();
            $caixas = Caixa::all();

            return view('layouts.dashboard.addcaixa', ['caixas' => $caixas],['prateleiras' => $prateleiras]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addCaixa(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $caixa = [];


                
                $caixa['caixa_numero'] = $request->caixa_numero;
                $caixa['caixa_prateleira_id'] = $request->caixa_prateleira_id;



                
                if(Caixa::create($caixa)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/caixas');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
