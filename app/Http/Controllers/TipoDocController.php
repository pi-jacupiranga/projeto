<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TipoDoc;
use App\Models\Documento;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TipoDocController extends Controller
{
    public function tipodocPage(){
        if(Auth::user()->is_admin == 1){

            $tiposdoc = TipoDoc::all();

            return view('layouts.dashboard.tiposdoc', ['tiposdoc' => $tiposdoc]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addTipodocPage(){
        if(Auth::user()->is_admin == 1){

            $tiposdoc = TipoDoc::all();

            return view('layouts.dashboard.addtiposdoc', ['tiposdoc' => $tiposdoc]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addTipodoc(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $tipodoc = [];
                $tipodoc['tipodoc_nome'] = $request->tipodoc_nome;
                
                if(TipoDoc::create($tipodoc)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/tiposdoc');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
