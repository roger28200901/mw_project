<?php

namespace App\Http\Controllers;

use Aerni\Spotify\PendingRequest;
use Illuminate\Http\Request;
use Aerni\Spotify\Spotify;

class SpotifyController extends Controller
{
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
            $id = $item['id'];
            $album_name = $item['album']['name'];
            $song_name = $item['name'];
            $artist_name = $item['album']['artists'][0]['name'];
            $image = $item['album']['images'][0]['url'];
            $uri = $item['uri'];
            $dic = [
                'id' => $id,
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
    public function searchTrack($id)
    {
        $defaultConfig =
            [
                'country' => 'US',
                'locale' => 'US',
                'market' => 'US',
            ];
        $spotify = new Spotify($defaultConfig);

        $item = $spotify->track($id)->get();
        $album_all = $spotify->album($item['album']['id'])->get();
        $album_items = $album_all['tracks']['items'];

        $returnArray = [
            'id' => $item['id'],
            'name' => $item['name'],
            'uri' => $item['uri'],
            'artists' => $item['artists'],
            'album' => [
                'image' => $item['album']['images'][0],
                'album_id' => $item['album']['id'],
                'album_uri' => $item['album']['uri'],
                'album_name' => $item['album']['name']
            ],
            'album_items' => $album_items
        ];
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

        return $spotify->searchAlbums($query_string)->get();
    }

    public function serachItems(string $query_string, string $type)
    {
        $defaultConfig =
            [
                'country' => 'US',
                'locale' => 'US',
                'market' => 'US',
            ];
        $spotify = new Spotify($defaultConfig);

        return $spotify->searchItems($query_string, $type)->get();
    }
}
