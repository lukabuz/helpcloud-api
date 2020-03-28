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

Route::post('voulenteer', 'VoulenteerController@create');

Route::get('verify/{token}', 'VoulenteerController@verify');
Route::post('delete/request', 'VoulenteerController@requestDeletion');
Route::get('delete/{token}', 'VoulenteerController@delete');

Route::post('help', 'HelpRequestController@create');

Route::get('voulenteers', 'VoulenteerController@index');
Route::get('offers', 'VoulenteerController@offers');
