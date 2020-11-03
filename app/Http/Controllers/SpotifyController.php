<?php

namespace App\Http\Controllers;

use Aerni\Spotify\PendingRequest;
use Illuminate\Http\Request;
use Aerni\Spotify\Spotify;

class SpotifyController extends Controller
{
    //
    public function searchTracks(string $query_string = "")
    {
        $defaultConfig =
            [
                'country' => 'US',
                'locale' => 'US',
                'market' => 'US',
            ];
        $spotify = new Spotify($defaultConfig);

        return $spotify->searchTracks('Closed on Sunday')->get();
    }

    public function searchAlbums(string $query_string = "")
    {
        $defaultConfig =
            [
                'country' => 'US',
                'locale' => 'US',
                'market' => 'US',
            ];
        $spotify = new Spotify($defaultConfig);

        return $spotify->searchAlbums($query_string)->market('US')->get();
    }
}
