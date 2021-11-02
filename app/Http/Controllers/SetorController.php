<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    //

    public function setorPage(){
        return view('layouts.dashboard.setores');
    }

    public function addSetor(){
        return view('layouts.dashboard.addsetor');
    }
}
