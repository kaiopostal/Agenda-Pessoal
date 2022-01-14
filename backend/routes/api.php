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

/* 'Admin\Auth\LoginController@index' */
Route::get('/lista', 'ListController@listagem');
Route::post('/adicionar', 'ListController@adicionar');
Route::get('/editar/{id}', 'ListController@editar');
Route::put('/update/{id}','ListController@update');
Route::delete('/delete/{id}', 'ListController@delete');
