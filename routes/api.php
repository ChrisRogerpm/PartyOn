<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ListaEventos','Api\WebServiceController@Eventos');
Route::get('/ListaEventosFiesta','Api\WebServiceController@ListarEventoFiesta');
Route::get('/ListaEventosMusica','Api\WebServiceController@ListarEventoMusica');
Route::get('/ListaEventosGastronomia','Api\WebServiceController@ListarEventoGastronomia');
Route::get('/ListaEventosDeporte','Api\WebServiceController@ListarEventoDeporte');
Route::get('/ListaEventosOtro','Api\WebServiceController@ListarEventoOtro');
Route::post('/MarcarAsistente','Api\WebServiceController@MarcarAsistente');
Route::post('/MarcarFavorito','Api\WebServiceController@MarcarFavorito');

Route::post('/VerificarFavorito','Api\WebServiceController@VerificarFavorito');
Route::post('/VerificarAsistir','Api\WebServiceController@VerificarAsistencia');


Route::post('/IniciarSesion','Api\WebServiceController@Login');
