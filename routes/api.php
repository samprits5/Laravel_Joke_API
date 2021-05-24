<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/logout', 'UserController@logout');


Route::prefix('randomjoke')->group(function () {
    Route::get('/', 'RandomJokeController@random');
});

Route::middleware('auth:sanctum')->prefix('randomjoke')->group(function () {
    Route::post('/', 'RandomJokeController@store');
    Route::get('/{joke}', 'RandomJokeController@show');
    Route::put('/{joke}', 'RandomJokeController@update');
    Route::delete('/{joke}', 'RandomJokeController@destroy');
});