<?php

use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\DocumentoApiController;
use App\Http\Controllers\Api\TelefoneApiController;
use Facade\FlareClient\Api;
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

Route::get('documento/{id}/cliente',[DocumentoApiController::class,'cliente']);
Route::get('cliente/{id}/documento',[ClienteApiController::class,'documento']);
Route::get('cliente/{id}/telefones',[ClienteApiController::class,'telefones']);
Route::get('telefones/{id}/cliente',[TelefoneApiController::class,'cliente']);

Route::apiResource('clientes',ClienteApiController::class);
Route::apiResource('documentos',DocumentoApiController::class);
Route::apiResource('telefones',TelefoneApiController::class);
