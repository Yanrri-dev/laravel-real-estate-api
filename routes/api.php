<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\SolicitudVisitaController;

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

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::resource('propiedades', PropiedadController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('solicitud_visitas', SolicitudVisitaController::class);

});

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [ AuthController::class, 'login' ]);
    Route::post('register', [ AuthController::class, 'register' ]);
    Route::post('me', [ AuthController::class,'me' ]);
});

