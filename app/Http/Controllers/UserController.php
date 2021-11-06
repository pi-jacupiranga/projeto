<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function userList(){
        
        if(Auth::user()->is_admin == 1){
            
            $setores = Setor::all();

            return view('layouts.dashboard.users', ['users' => DB::table('users')->paginate(10), 'setores' => $setores]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);

    }

    public function addUserPage(){

        $setores = Setor::all();
        
        if(Auth::user()->is_admin == 1){
            return view('layouts.dashboard.adduser', ['setores' => $setores]);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
        
    }

    public function addUser(Request $request){
        // VERIFICA SE USUÁRIO É ADMINISTRADOR
        if(Auth::user()->is_admin == 1){
            $user = [];

            // VALIDAR DADOS ENVIADOS
                
                // CASO VÁLIDOS
                
                // SEPARAR NOME E SOBRENOME CASO HAJA E ATRIBUIR ÀS VARIÁVEIS
                if (mb_strpos($request->nome, ' ') !== false) {
                    $nome = explode(" ", $request->nome, 2);
                    $user['name'] = $nome[0];
                    $user['surname'] = $nome[1];
                } else {
                    $user['name'] = $request->nome;
                    $user['surname'] = " ";
                }

                // ATRIBUIR DEMAIS 
                $user['password'] = Hash::make($request->password);
                $user['email'] = $request->email;
                $user['cpf'] = $request->cpf;
                $user['rg'] = $request->rg;
                $user['cargo'] = $request->cargo;
                $user['setor_id'] = $request->setor_id;
                $user['data_admissao'] = $request->data_admissao;
                $user['is_admin'] = $request->isadmin;

                // TENTA ADICIONAR AO BANCO DE DADOS 
                if(User::create($user)){
                    // COM SUCESSO REDIRECIONA PARA LISTA DE USUÁRIOS 
                    return redirect('/dashboard/users');
                } else {
                    // CASO NÃO CONSIGA RETORNA MENSAGEM DE ERRO AO SALVAR NO BANCO DE DADOS
                }

            // CASO HAJA ALGUM ERRO, DISPARAR MENSAGEM DE ERRO
        }
    }
}
