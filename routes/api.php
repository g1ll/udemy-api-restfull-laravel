<?php

use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\DocumentoApiController;
use App\Http\Controllers\Api\TelefoneApiController;
use App\Http\Controllers\Api\FilmeApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('clientes',[ClienteApiController::class,'index']);


//Rotas de Clientes
Route::get('cliente/{id}/documento',[ClienteApiController::class,'documento']);
Route::get('cliente/{id}/telefones',[ClienteApiController::class,'telefones']);
Route::apiResource('clientes',ClienteApiController::class);

//Rotas de Documentos
Route::get('documento/{id}/cliente',[DocumentoApiController::class,'cliente']);
Route::apiResource('documentos',DocumentoApiController::class);

//Rotas de Telefones
Route::get('telefones/{id}/cliente',[TelefoneApiController::class,'cliente']);
Route::apiResource('telefones',TelefoneApiController::class);

//Rota de Filmes
Route::apiResource('filme',FilmeApiController::class);
