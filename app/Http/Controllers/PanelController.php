<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Evento;
use App\Http\Requests\RequestEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PanelController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return view('Cliente.Evento.index',compact('categoria'));
    }

    public function RegistrarEvento(Request $request)
    {
        $user_id = Auth::user()->id;

        $imagen = $request->file('imagen');

        $evento = new Evento;
        $evento->nombre_evento = $request->input('nombre_evento');
        $evento->descripcion_evento = $request->input('descripcion_evento');
        $evento->user_id = $user_id;
        $evento->categoria_id = $request->input('categoria_id');
        $evento->fecha_inicio_evento = $request->input('fecha_inicio_evento');
        $evento->hora_evento = $request->input('hora_evento');
        $evento->direccion_evento = $request->input('direccion_evento');
        $evento->imagen = $imagen->getClientOriginalName();
        $evento->estado_evento = 1;
        $evento->latitud = $request->input('latitud');
        $evento->longitud = $request->input('longitud');
        $evento->save();

        $CarpetaAlmacenar = 'images';
        $imagen->move($CarpetaAlmacenar, $imagen->getClientOriginalName());

        return back();

    }
}
