<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| 
	
	'middleware' => 'throttle:5'
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('throttle:5')->post('/user/login', 'Api\UserController@login');
Route::middleware('throttle:5')->post('/user/register', 'Api\UserController@register');

Route::group(['middleware' => 'auth:api', 'prefix' => 'notes'], function () {
	Route::get('/', 'Api\NoteController@index');
	Route::post('/', 'Api\NoteController@store');
	Route::delete('/{id}', 'Api\NoteController@destroy');
	Route::get('/{id}', 'Api\NoteController@show');
	Route::patch('/{id}', 'Api\NoteController@update');
});


Route::middleware('auth:api')->get('/user/notes', 'Api\NoteController@userNotes');
