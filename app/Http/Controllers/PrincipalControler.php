<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalControler extends Controller
{
    public function principal (){
        return view("admin.fornecedor.index");
    }
}
