<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

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
            dd($request->setor_nome);
        }
        return view('layouts.dashboard.index', ['msg' => "Você não possui acesso a área que tentou acessar."]);
    }
}
