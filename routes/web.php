<?php

use Illuminate\Support\Facades\Route;

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
    return response()->json(['title'=>'Laravel Joke API', 'version'=>'1.0.0' , 'dev'=>'Samprit']);
});

Route::get( '/invalid_token', function () {
    return response()->json(['error'=>'Invalid Token']);
})->name('login');
