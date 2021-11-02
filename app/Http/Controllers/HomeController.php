<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.dashboard.index');
    }

    public function userList(){

        return view('layouts.dashboard.users');
    }

    public function addUserPage(){
        return view('layouts.dashboard.adduser');
    }

    public function addUser(Request $request){
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
