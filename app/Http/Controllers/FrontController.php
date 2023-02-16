<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;


class FrontController extends Controller
{
    public function index(Request $request){
        $request->session()->regenerate();
        $productos=Producto::all();
        return view('welcome',compact('productos'));

    }
}
