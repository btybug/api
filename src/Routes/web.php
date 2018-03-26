<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//Routes
Route::get('/', 'IndexController@getRequested',true)->name('bty_api_requested');
Route::get('/approved', 'IndexController@getApproved',true)->name('bty_api_approved');
Route::get('/manage', 'IndexController@getManage',true)->name('bty_api_manage');