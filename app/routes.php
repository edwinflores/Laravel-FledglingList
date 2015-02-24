<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/form_submit', array('as' => 'form_submit', 'uses' => 'UsersController@form_handler'));
Route::get('/index', 'TasksController@index');
Route::get('/add_task', array('before' => 'auth', 'TasksController@add_task'));
Route::get('/edit', 'TasksController@edit');
Route::get('/delete', 'TasksController@delete');
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));