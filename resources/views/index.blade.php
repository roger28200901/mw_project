@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @section('main')
    <div class="container flex justify-center">
        <div class="flex justify-center column align-center" id="index-middle-container">
            <img src="{{ asset('img/MW(music webtise)@2x.png') }}" id="index-middle-logo" width="285" height="261" alt="">
            <img src="{{ asset('img/background-five-line.png') }}" width="383" height="45" alt="">
            <img src="{{ asset('img/play.@2x.png') }}" id="play-button" width="49" height="49" alt="" onclick="location.href='reveal' ">
        </div>
    </div>
    <img id="background-img" src="{{ asset('img/background.png') }}" alt="">
    @endsection

    @section('script')
    <script>
        const hash = window.location.hash
            .substring(1)
            .split('&')
            .reduce(function(initial, item) {
                if (item) {
                    var parts = item.split('=');
                    initial[parts[0]] = decodeURIComponent(parts[1]);
                }
                return initial;
            }, {});
        window.location.hash = '';

        // Set token
        let _token = hash.access_token;

        const authEndpoint = 'https://accounts.spotify.com/authorize';

        // Replace with your app's client ID, redirect URI and desired scopes
        const clientId = '5390f06c359b43519969161f3d5cbbd3';
        const redirectUri = 'http://localhost:8000'; //location最好設定原本的
        const scopes = [
            'streaming',
            'user-read-email',
            'user-read-private',
            'user-modify-playback-state'
        ];

        // If there is no token, redirect to Spotify authorization
        if (!_token) {
            window.location = `${authEndpoint}?response_type=token&client_id=${clientId}&redirect_uri=${redirectUri}&scope=${scopes.join('%20')}&show_dialog=true`;
        }
        var now = new Date();
        var time = now.getTime();
        time += 3600 * 1000;
        now.setTime(time);
        document.cookie =
            '_token=' + _token +
            '; expires=' + now.toUTCString() +
            '; path=/';
    </script>
    @endsection

</body>

</html>