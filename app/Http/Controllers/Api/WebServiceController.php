<?php

namespace App\Http\Controllers\Api;

use App\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class WebServiceController extends Controller
{
    public function Eventos()
    {
        $eventos = Evento::all();
        return Response::json($eventos);
    }
}
