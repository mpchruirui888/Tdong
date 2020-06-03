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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'home'],function(){
        Route::get('index','Home\IndexController@index');
        Route::get('test','Home\IndexController@test');
        Route::get('develop','Home\IndexController@develop');
        Route::get('trade','Home\tradeController@trade');
});
