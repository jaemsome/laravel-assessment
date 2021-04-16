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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Restricted authorized users
Route::middleware('auth:api')->post('/invite', 'InviteController@invite')->name('invite');

Route::get('/accept/{token}', 'InviteController@accept')->name('accept');
Route::post('/create-account', 'UserController@store')->name('create-account');