<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::group(['middleware'=>'auth:sanctum'],function (){
    //Route::apiResource('/cliente',\App\Http\Controllers\ClienteController::class);
    Route::apiResource('/cooperativa', \App\Http\Controllers\CooperativaController::class);
    Route::apiResource('/cliente', \App\Http\Controllers\ClienteController::class);
	Route::apiResource('/lote', \App\Http\Controllers\LoteController::class);
	Route::apiResource('/anticipo', \App\Http\Controllers\AnticipoController::class);
    Route::apiResource('/descuento', \App\Http\Controllers\DescuentoController::class);
    Route::apiResource('/diaria', \App\Http\Controllers\DiariaController::class);
    Route::apiResource('/quincena', \App\Http\Controllers\QuincenaController::class);
    Route::post('/activar/{id}', [\App\Http\Controllers\CooperativaController::class,'activar']);
    Route::post('/listDescuento/{id}', [\App\Http\Controllers\DescuentoController::class,'listDescuento']);
    Route::post('/searchLote', [\App\Http\Controllers\LoteController::class,'searchLote']); 
    Route::post('/buscarQuincena', [\App\Http\Controllers\QuincenaController::class,'buscarQuincena']); 

    /*  Route::resource('/descuento',\App\Http\Controllers\DescuentoController::class);
    Route::resource('/diaria',\App\Http\Controllers\DiariaController::class);
    Route::resource('/laboratorio',\App\Http\Controllers\LaboratorioController::class);
    Route::resource('/lote',\App\Http\Controllers\LoteController::class);
    Route::resource('/quincena',\App\Http\Controllers\QuincenaController::class);
    Route::resource('/user',\App\Http\Controllers\UserController::class);
    Route::post('/validar',[\App\Http\Controllers\CooperativaController::class,'validar']);
*/
//});
