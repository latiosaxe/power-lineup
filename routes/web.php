<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('website/website');
    });
    Route::get('/faqs', function () {
        return view('website/website');
    });

    Route::get('/blog', function () {
        return view('website/website');
    });
    Route::get('/whitepaper', function () {
        return view('website/website');
    });
    Route::get('/etherscan', function () {
        return view('website/website');
    });
    Route::get('/contact', function () {
        return view('website/website');
    });
    Route::get('/get-tokens', function () {
        return view('website/website');
    });

    Route::get('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');
    Route::post('/authenticate', 'Auth\AuthController@authenticate');

    Route::get('/getTokens', 'Control\DashboardController@getTokens');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'control', 'namespace' => 'Control'], function(){
    Route::get('/validation', 'Auth\AuthController@validateUser');
    Route::get('/', 'DashboardController@index');
    Route::post('tokensUpdate/', 'DashboardController@fakeUpdate');
});


Route::post('/newsletterUser', 'newsletterUser@newUser');
