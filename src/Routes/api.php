<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::get('/user', function (Request $request) {
        return Response::json(['user' => Auth::user()]);
    })->middleware('auth:api');
    Route::get('/login', 'ApiLoginController@showLogin');
    Route::get('/authorize', 'AuthorizationController@authorize')->middleware(['web', 'auth']);
    Route::get('/authorized', 'OauthController@authorized')->middleware(['web', 'auth']);
    Route::get('/authenticated', 'OauthController@authenticated');
    Route::get('/redirect', 'OauthController@redirect');
    Route::post('/login', 'ApiLoginController@login');