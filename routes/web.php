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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('add', function () {
    return 'add';
})->name('add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', 'HomeController@add')->name('add');

Route::post('/add', 'HomeController@create')->name('create');

Route::get('/facts', 'HomeController@facts')->name('facts');



