<?php

namespace App\Http\Controllers\Api;

use App\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class WebServiceController extends Controller
{
    public function Eventos()
    {
        $eventos = Evento::all();
        return Response::json($eventos);
    }

    public function Login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            $result = "success";
            echo 'success';
        } else {
            echo "no";
        }
    }

    public function ListarEventoFiesta()
    {
        $eventos_fiesta = Evento::where('categoria_id', 1)->get();
        return Response::json($eventos_fiesta);
    }

    public function ListarEventoMusica()
    {
        $eventos_musica = Evento::where('categoria_id', 2)->get();
        return Response::json($eventos_musica);
    }

    public function ListarEventoGastronomia()
    {
        $eventos_gastronomia = Evento::where('categoria_id', 3)->get();
        return Response::json($eventos_gastronomia);
    }

    public function ListarEventoDeporte()
    {
        $eventos_deporte = Evento::where('categoria_id', 4)->get();
        return Response::json($eventos_deporte);
    }

    public function ListarEventoOtro()
    {
        $eventos_otro = Evento::where('categoria_id', 6)->get();
        return Response::json($eventos_otro);
    }
}
