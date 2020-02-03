<?php

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

Route::group([
    'namespace' => 'API\V1',
    'middleware' => 'jwt.auth',
    'prefix' => 'v1'
], function() {
	Route::get('rules', 'RulesController@index');
});

Route::group([
    'namespace' => 'API\V1',
    'prefix' => 'v1'
], function() {
    Route::post('login', 'AuthController@login');
});