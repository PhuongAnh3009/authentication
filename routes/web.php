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
//
Route::get('/', function () {
    return view('welcome');
});
//})-> name('main-page');

Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')
    ->name('login');
Route::get('logout', 'HomeController@getLogout')->name('logout');
Route::group(['middleware' => 'checkLogin', 'prefix' => 'admin'], function () {
    Route::get('home', 'HomeController@getIndex');

});

//Route::get('','HomeController@getIndex');
//
//Route::get('logout','HomeController@getLogout');

