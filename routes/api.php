<?php

use Aerni\Spotify\Spotify;
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


Route::get('searchTracks/{query_string?}', 'SpotifyController@searchTracks');
Route::get('searchTrack/{id}', 'SpotifyController@searchTrack');

Route::get('searchAlbums/{query_string?}', 'SpotifyController@searchAlbums');
Route::get('searchItems/{keyword}/{type}', 'SpotifyController@serachItems');

// Route::get('getAccessToken', function () {
//     return view('spotify');
// });
