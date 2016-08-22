<?php

use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/home', 'HomeController@index');

/**
 * show task dashboard
 */
Route::get('/tasks', 'TaskController@index');

/**
 * add new task
 */
Route::post('/task', 'TaskController@store');

/**
 * show task dashboard
 */
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/', function () {
    return view('welcome');
});


