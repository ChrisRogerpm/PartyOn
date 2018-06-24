<?php

namespace App\Http\Controllers\Api;

use App\Asistente;
use App\Evento;
use App\Favorito;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Response;

class WebServiceController extends Controller
{
    public function Eventos()
    {
        $results = DB::select(DB::raw("select (select count(ad.id) from asistentes as ad where ad.evento_id = e.id) as asistencia,e.* from eventos as e where e.estado_evento = 1"));

        return Response::json($results);
    }

    public function Login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            return Response::json($user);
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


    public function MarcarAsistente(Request $request)
    {
        $user_id = $request->input('user_id');
        $evento_id = $request->input('evento_id');

        $asistente = Asistente::where('user_id', $user_id)->where('evento_id', $evento_id)->count();

        if ($asistente == 1) {
            $asistencia = Asistente::where('user_id', $user_id)->where('evento_id', $evento_id)->first();
            $asistencia->delete();
        } else {
            $asist = new Asistente;
            $asist->user_id = $user_id;
            $asist->evento_id = $evento_id;
            $asist->asistente = "1";
            $asist->save();
        }

    }

    public function MarcarFavorito(Request $request)
    {
        $user_id = $request->input('user_id');
        $evento_id = $request->input('evento_id');

        $favorito = Favorito::where('user_id', $user_id)->where('evento_id', $evento_id)->count();

        if ($favorito == 1) {
            $favorito_ = Favorito::where('user_id', $user_id)->where('evento_id', $evento_id)->first();
            $favorito_->delete();
        } else {
            $favorit = new Favorito;
            $favorit->user_id = $user_id;
            $favorit->evento_id = $evento_id;
            $favorit->favorito = "1";
            $favorit->save();
        }
    }

    public function VerificarAsistencia(Request $request)
    {
        $user_id = $request->input('user_id');
        $evento_id = $request->input('evento_id');

        $asistente = Asistente::where('user_id', $user_id)->where('evento_id', $evento_id)->count();

        if ($asistente == 1) {
            echo "Verificado";
        } else {
            echo "No Verificado";
        }
    }

    public function VerificarFavorito(Request $request)
    {
        $user_id = $request->input('user_id');
        $evento_id = $request->input('evento_id');
        $favorito = Favorito::where('user_id', $user_id)->where('evento_id', $evento_id)->count();
        if ($favorito == 1) {
            echo "Verificado";
        } else {
            echo "No Verificado";
        }
    }
}
