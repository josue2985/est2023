<?php

namespace App\Http\Controllers;

use App\Models\Ciuadedes;
use App\Models\Vistas;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function promotions(){
        $data = [
            "vistas"=>1
        ];
        Vistas::create($data);
        $ciudades = Ciuadedes::get();
        return view('pages.promotions', compact('ciudades'));
    }

    public function iniciarSesion(){
        return view('auth.login');
    }
}
