<?php

namespace App\Http\Controllers;

use Aerni\Spotify\Spotify;
use Illuminate\Http\Request;
use App\Http\Controllers\SpotifyController;

class RevealController extends Controller
{


    //
    public function index($search = "lady+gaga")
    {
        $spotifyController = new SpotifyController();
        $array = $spotifyController->searchTracks($search);
        return view('reveal')->with('datas', $array);
    }
    public function playSongPage($id)
    {
        $spotifyController = new SpotifyController();
        $data = $spotifyController->searchTrack($id);
        return view('playSong')->with('data', $data);
    }
    public function test()
    {
        $url = "https://accounts.spotify.com/authorize?client_id=5390f06c359b43519969161f3d5cbbd3&response_type=token&redirect_uri=http%3A%2F%2Flocalhost%3A8000&scope=streaming%2520user-read-email%2520user-modify-playback-state%2520user-read-private";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $redirect_url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
        curl_close($ch);
        return redirect($redirect_url);
    }
}
