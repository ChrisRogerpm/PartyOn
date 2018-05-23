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
//            return response()->json($result);
            echo 'success';
            //return Response::json($user);
        } else {
            echo "no";
        }
    }
}
