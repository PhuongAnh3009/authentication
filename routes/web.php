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

Route::group(['prefix' => 'admin', 'middleware' => 'checkLogin'], function () {
        Route::get('home', 'HomeController@getIndex');
        //Hoem
        Route::group(['prefix' => 'home'], function (){
            Route::get('index', [
                'as' => 'index',
                'uses' => 'HomeController@index'
            ]);
        });
        //Category
        Route::group(['prefix' => 'category'], function (){
            Route::get('list', [
                'as' => 'list',
                'uses' => 'CategoryController@index'
            ]);
            Route::get('add', [
                'as' => 'add',
                'uses' => 'CategoryController@create'
            ]);
            Route::post('add', [
                'as' => 'add',
                'uses' => 'CategoryController@store'
            ]);
            Route::get('edit/{id}', [
                'as' => 'edit',
                'uses' => 'CategoryController@edit'
            ]);
            Route::post('update/{id}', [
                'as' => 'update',
                'uses' => 'CategoryController@update'
            ]);
            Route::get('delete/{id}', [
                'as' => 'delete',
                'uses' => 'CategoryController@destroy'
            ]);
        });
});

//Route::get('','HomeController@getIndex');
//
//Route::get('logout','HomeController@getLogout');

