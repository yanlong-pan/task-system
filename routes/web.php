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
    return view('welcome');
});

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks', 'TaskController')->middleware('auth');
Route::get('tasks/{task}/delete', 'TaskController@delete')->middleware('auth')->name('tasks.delete');

Route::fallback(function () {
    abort('404');
});
