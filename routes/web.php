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
    return view('index');
})->name('index');

Route::get('reveal/{search?}', 'RevealController@index');
Route::get('playSong/{id}', 'RevealController@playSongPage');


// Test Spotify 
Route::get('test', function () {
    return view('spotify');
});
