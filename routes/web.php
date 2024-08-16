<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/application', 'App\Http\Controllers\ApplicationController@index');
Route::post('/application', 'App\Http\Controllers\ApplicationController@send');

Route::get('/login', '\App\Http\Controllers\AuthController@form');
Route::post('/login', '\App\Http\Controllers\AuthController@login');
Route::get('/logout', '\App\Http\Controllers\AuthController@logout')->middleware('manager');

Route::prefix('admin')->middleware('manager')->group(function () {
    Route::get('/app-list', '\App\Http\Controllers\AppListController@index');
});
