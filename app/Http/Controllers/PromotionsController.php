<?php

namespace App\Http\Controllers;

use App\Models\Codigos;
use App\Models\Promotions;
use App\Models\Vistas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PromotionsController extends Controller
{
    public function inscripcion(){
        try{
            request()->validate([
                "nombre"=>"required|string",
                "apellido"=>"required|string",
                "telefono"=>"required|string",
                "correo"=>"required|email",
                "ciudad"=>"required|string",
                "usuarioInstagram"=>"required|string",
                "codigo"=>"required|string",
            ]);

            $data = [
                "nombre" => request()->nombre,
                "apellido" => request()->apellido,
                "telefono" => request()->telefono,
                "correo" => request()->correo,
                "ciudad" => request()->ciudad,
                "usuarioInstagram" => request()->usuarioInstagram,
                "codigo" => request()->codigo,
            ];

            $codigo = Codigos::where('codigos', request()->codigo)->first();
            if($codigo == NULL){
                return Redirect()->route('promotions')->with([
                    "tag"=>"Su inscripción no fue exitosa",
                    "titulo"=>"Código",
                    "message"=>"El código que ingresaste no es valido",
                    "tipo"=>"error"
                ]);
            }

            $inscrito = Promotions::where('codigo', request()->codigo)->first();

            if($inscrito == NULL){
                Promotions::create($data);
                return Redirect()->route('promotions')->with([
                    "tag"=>"Su inscripción fue exitosa",
                    "titulo"=>"Inscripción",
                    "message"=>"Su inscripción fue exitosa",
                    "tipo"=>"success"
                ]);
            }

            return Redirect()->route('promotions')->with([
                "tag"=>"Su inscripción no fue exitosa",
                "titulo"=>"Inscripción",
                "message"=>"Codigo ingresado esta duplicado",
                "tipo"=>"error"
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return Redirect()->route('promotions')->with([
                "tag"=>"Su inscripción no fue exitosa",
                "titulo"=>"Inscripción",
                "message"=>"Codigo ingresado esta duplicado",
                "tipo"=>"error"
            ]);
        }
    }

    public function dashboard(){

        //TOP 5
        $sql = "SELECT ciudad, COUNT(ciudad) as frequency FROM promociones GROUP BY ciudad ORDER BY frequency DESC LIMIT 0,5";
        $topCinco = DB::select($sql);

        return view('admin.dashboard.dashboard', compact('topCinco'));
    }

    public function inscritos(){
        $answer = Promotions::get();
        return view('admin.inscritos.inscritos', compact('answer'));
    }

    public function porFecha(){
        request()->validate([
            "fechaInicial"=>"required|date"
        ]);
        $fi = request()->fechaInicial;
        $ff = request()->fechaFinal;
        if(is_null($ff)){
            $answer = Promotions::where('created_at','>=',$fi)->get();
        }else{
            // $arregloFecha = explode('-',$ff);
            // $dia = ($arregloFecha[2])*1 + 1;
            // if($dia<10){
            //     $dia = '0'.$dia;
            // }
            // $ff = $arregloFecha[0].'-'.$arregloFecha[1].'-'.$dia;
            if($fi<$ff){
                $answer = Promotions::where('created_at','>=', $fi)->where('created_at','<=',$ff)->get();
            }else{
                return Redirect()->route('inscritos')->with([
                    "tag"=>"Fecha inicial no puede ser mayor",
                    "titulo"=>"Error con las fechas",
                    "message"=>"Fecha inicial no puede ser mayor que la fecha final",
                    "tipo"=>"error"
                ]);
            }
        }
        return view('admin.inscritos.inscritos', compact('answer'));
    }

    public function contador(){
        $answer = Vistas::count();
        return response(json_encode($answer), 200)->header('Content-type', 'text/plain');
        // return view('admin.visitas.vistas', compact('answer'));
    }

    public function porCiudad(){

        //CONTAR CUANTOS REGISTROS HAY POR CIUDAD
        // $sql = "SELECT ciudad, COUNT(ciudad) as frequency FROM promociones GROUP BY ciudad ORDER BY frequency DESC";
        // $ciudad = DB::select($sql);
        //TOP 5
        $sql = "SELECT ciudad, COUNT(ciudad) as frequency FROM promociones GROUP BY ciudad ORDER BY frequency DESC LIMIT 0,5";
        $topCinco = DB::select($sql);

        return response(json_encode($topCinco), 200)->header('Content-type', 'text/plain');
        // return view('admin.inscritos.porCiudad', compact('topCinco'));
    }

    public function porMes(){
        request()->validate([
            'mes'=>'required|numeric'
        ]);
        $mes = request()->mes;
        $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as fecha, COUNT(DATE_FORMAT(created_at, '%Y-%m')) as frequency FROM promociones WHERE EXTRACT(YEAR FROM created_at) = '2023' GROUP BY DATE_FORMAT(created_at, '%Y-%m') ORDER BY frequency DESC LIMIT 0, $mes";

        $topCinco = DB::select($sql);

        return response(json_encode($topCinco), 200)->header('Content-type', 'text/plain');
    }
}
