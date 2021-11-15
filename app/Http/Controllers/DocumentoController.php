<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documento;
use App\Models\TipoDoc;
use App\Models\Setor;
use App\Models\Caixa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function documentoPage(){
        if(Auth::user()->is_admin == 1){

            $documentos = Documento::all();

            return view('layouts.dashboard.documentos', ['documentos' => $documentos]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }

    public function addDocumentoPage(){
        if(Auth::user()->is_admin == 1){

            $documentos = Documento::all();
            $setores = Setor::all();
            $caixas = Caixa::all();
            $tiposdoc = TipoDoc::all();

            return view('layouts.dashboard.adddocumentos', 
            ['documentos' => $documentos,
            'setores' => $setores,
            'caixas' => $caixas,
            'tiposdoc' => $tiposdoc
            ]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }


    public function addDocumento(Request $request){
        if(Auth::user()->is_admin == 1){
            // VALIDA DADOS 
            // SE VALIDOS 
                $documento = [];
                $documento['documento_nome'] = $request->documento_nome;
                $documento['documento_ano'] = $request->documento_ano;
                $documento['documento_periodo'] = $request->documento_periodo;
                $documento['documento_expurgo'] = $request->documento_expurgo;
                $documento['documento_observacao'] = $request->documento_observacao;
                $documento['documento_setor_id'] = $request->documento_setor_id;
                $documento['documento_caixa_id'] = $request->documento_caixa_id;
                $documento['documento_tiposdoc_id'] = $request->documento_tiposdoc_id;
                
                if(Documento::create($documento)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE ESTANTES
                    return redirect('/dashboard/documentos');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }
            //CASO NÃO
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
