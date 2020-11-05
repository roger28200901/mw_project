<?php

namespace App\Http\Controllers;

use Aerni\Spotify\Spotify;
use Illuminate\Http\Request;
use App\Http\Controllers\SpotifyController;

class RevealController extends Controller
{
    //
    public function index()
    {
        $spotifyController = new SpotifyController();
        $array = $spotifyController->searchTracks("lady gaga");
        return view('reveal')->with('datas', $array);
    }
    public function playSongPage($id)
    {
        $spotifyController = new SpotifyController();
        $data = $spotifyController->searchTrack($id);
        return view('playSong')->with('data', $data);
    }
}
