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

Route::get('/', 'TasksController@index');
Route::get('/add_task', 'TasksController@add_task');
Route::get('/edit', 'TasksController@edit');
Route::get('/delete', 'TasksController@delete');