<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setor;
use App\Models\Atribuicao;

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
                $user['data_admissao'] = $request->data_admissao;
                $user['is_admin'] = $request->isadmin;

                // TENTA ADICIONAR AO BANCO DE DADOS E SALVA DADOS IMPORTANTES EM VARIÁVEL
                $user = User::create($user);

                // SE USUÁRIO FOI CRIADO
                if($user->exists){

                    // atribui ao setor
                    $atribuicao = [];
                    $atribuicao['user_id'] = $user->id;
                    $atribuicao['setor_id'] = $request->setor_id;

                    if(Atribuicao::create($atribuicao)){

                        // COM SUCESSO REDIRECIONA PARA LISTA DE USUÁRIOS 
                        return redirect('/dashboard/users');
                
                    } else {

                        // REDIRECIONAR COM ERRO: USUÁRIO CRIADO, NÃO ATRIBUÍDO A NENHUM SETOR

                    }

                    
                } else {

                    // REDIRECIONAR COM ERRO: USUÁRIO NÃO CRIADO

                }

            // REDIRECIONAR COM ERRO: DADOS INVÁLIDOS, CHECAR CAMPOS NOVAMENTE
        } else {
            // REDIRECIONAR COM ERRO: NÃO POSSUI PRIVILÉGIOS ADMINISTRATIVOS
        }
    }

    public function destroyUser($id){
        // VERIFICA SE USUÁRIO TEM PRIVILÉGIOS ADMINISTRATIVOS
        if(Auth::user()->is_admin == 1){

            foreach(Atribuicao::all() as $atribuicao){

                if($atribuicao->user_id == $id){

                    if(Atribuicao::findOrFail($atribuicao->id)->delete()){

                        // TENTA REMOVER DO BANCO DE DADOS
                        if(User::findOrFail($id)->delete()){

                            // REDIRECIONA COM SUCESSO
                            return redirect('/dashboard/users')->with('msg', 'Usuário removido com sucesso');

                        } else {

                            // REDIRECIONA COM ERRO: ERRO AO APAGAR USUÁRIO DO BANCO DE DADOS

                        }

                    } else {

                        // REDIRECIONA COM ERRO: ERRO AO APAGAR ATRIBUIÇÃO DO BANCO DE DADOS

                    }

                }

            }
            
        } else {
            // REDIRECIONA COM ERRO: NÃO POSSUI PRIVILÉGIOS ADMINISTRATIVOS
        }
        
    }
}
