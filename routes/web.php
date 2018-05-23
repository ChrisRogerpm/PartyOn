<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;

Route::get('/', function () {
    return view('welcome');
//    $email = "Christian@gmail.com";
//    $password = "123123";
//
//    if (Auth::attempt(['email' => $email, 'password' => $password])) {
//        $user = Auth::user();
//        return Response::json($user);
//    } else {
//        echo "no";
//    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('PanelAdministracion', 'PanelController@index')->name('PanelAdministracion');
Route::get('Historial', 'HistorialController@index')->name('Historial');
Route::get('EstadoCuenta', 'CuentaController@index')->name('EstadoCuenta');
Route::get('Estadistica', 'EstadisticaController@index')->name('Estadistica');


Route::post('RegistrarEvento', 'PanelController@RegistrarEvento')->name('RegistrarEvento');