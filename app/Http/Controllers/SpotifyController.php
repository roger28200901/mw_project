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

        $collections =  $spotify->searchTracks($query_string)->get();
        $returnArray = [];
        foreach ($collections['tracks']['items'] as $item) {
            $album_name = $item['album']['name'];
            $song_name = $item['name'];
            $artist_name = $item['album']['artists'][0]['name'];
            $image = $item['album']['images'][0]['url'];
            $uri = $item['uri'];
            $dic = [
                'image' => $image,
                'uri' => $uri,
                'song_name' => $song_name,
                'artist_name' => $artist_name,
                'album_name' => $album_name
            ];
            $returnArray[] = $dic;
        }
        return $returnArray;
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
