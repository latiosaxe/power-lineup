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
    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [  'localize', 'localeSessionRedirect', 'localizationRedirect' ]
    ],
    function() {

        Route::get('/', function() {
            return view('website.sections.home');
        });

//        Route::get(LaravelLocalization::transRoute('routes.home'),       [ 'as' => 'home',          'uses' => function() {return view('website.sections.home');}]);
        Route::get(LaravelLocalization::transRoute('routes.faqs'),       [ 'as' => 'faqs',          'uses' => function() {return view('website.sections.faqs');}]);
        Route::get(LaravelLocalization::transRoute('routes.blog'),       [ 'as' => 'blog',          'uses' => function() {return view('website.sections.blog');}]);
        Route::get(LaravelLocalization::transRoute('routes.whitepaper'), [ 'as' => 'whitepaper',    'uses' => function() {return view('website.sections.whitepaper');}]);
        Route::get(LaravelLocalization::transRoute('routes.etherscan'),  [ 'as' => 'etherscan',     'uses' => function() {return view('website.sections.etherscan');}]);
        Route::get(LaravelLocalization::transRoute('routes.contact'),    [ 'as' => 'contact',       'uses' => function() {return view('website.sections.contact');}]);
        Route::get(LaravelLocalization::transRoute('routes.get-tokens'), [ 'as' => 'get-tokens',    'uses' => function() {return view('website.sections.tokens');}]);
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
