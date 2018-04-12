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
Route::get('/test', 'OauthController@test');


Route::group(['prefix' => 'apps'], function ($router) {
    Route::get('/', 'AppsController@getIndex', true)->name('app_plugins');
    Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);

    Route::group(['prefix' => 'core-apps'], function () {
        Route::get('/', 'AppsController@getCoreApps', true)->name('bty_api_core_apps');
        Route::post('/create-product', 'AppsController@postCreateProduct', true)->name('bty_api_apps_create_product');
        Route::post('/delete', 'AppsController@delete', true)->name('bty_api_app_product_delete');
        Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/', 'AppsController@getEditCore', true);
            Route::get('/{param}', 'AppsController@getEditCore', true)->name('bty_api_app_edit_product');
            Route::post('/{param}', 'AppsController@postEditCore', true)->name('bty_api_app_edit_product_post');
        });
    });

    Route::group(['prefix' => 'extra-apps'], function () {
        Route::get('/', 'AppsController@getExtra', true)->name('bty_api_app_extra');
        Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);
    });
});
