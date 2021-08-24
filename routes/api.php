<?php

use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\DocumentoApiController;
use App\Http\Controllers\Api\TelefoneApiController;
use App\Http\Controllers\Api\FilmeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticateController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthenticateController::class, 'authenticate']);
Route::post('login-refresh', [AuthenticateController::class, 'refreshToken']);
Route::get('me', [AuthenticateController::class, 'getAuthenticatedUser']);

// Route::get('clientes',[ClienteApiController::class,'index']);


Route::middleware('auth:api')->group(function () {
    // Route::group([

    //     'middleware' => 'auth:api',
    //     // 'prefix' => 'auth'

    // ], function ($router) {
    //Rotas de Clientes
    Route::get('cliente/{id}/documento', [ClienteApiController::class, 'documento']);
    Route::get('cliente/{id}/telefones', [ClienteApiController::class, 'telefones']);
    Route::get('cliente/{id}/filmes-alugados', [ClienteApiController::class, 'alugados']);
    Route::apiResource('clientes', ClienteApiController::class);

    //Rotas de Documentos
    Route::get('documento/{id}/cliente', [DocumentoApiController::class, 'cliente']);
    Route::apiResource('documentos', DocumentoApiController::class);

    //Rotas de Telefones
    Route::get('telefones/{id}/cliente', [TelefoneApiController::class, 'cliente']);
    Route::apiResource('telefones', TelefoneApiController::class);

    //Rota de Filmes
    Route::apiResource('filme', FilmeApiController::class);

});
