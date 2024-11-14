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

// Rotas para login
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

//Grupo de Rotas protegidas por autenticação
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::middleware('auth:sanctum')->post('/logout', 'AuthController@logout');
    Route::apiResource('/users', 'UserController');
    Route::post('/import', 'ImportController@handle');
    Route::get('/data', 'DataController@index');
    Route::get('/file-history', 'FileHistoryController@index');
});
