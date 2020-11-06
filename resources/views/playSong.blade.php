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
    <div id="play-container" class="flex">
        <!-- left side -->
        <div class="song-image">
            <img src="{{ $data['album']['image']['url'] }}" width="400" height="400" alt="">
        </div>
        <!-- right side  -->
        <div class="song-container">
            <h1>{{ $data['album']['album_name'] }}</h1>
            <table id="example" class="table table-dark display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="row">Title</th>
                        <th scope="row">Artist</th>
                        <th scope="row">Album</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($data['album_items'] as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['artists'][0]['name'] }}</td>
                        <td>{{ $data['album']['album_name'] }}</td>
                    </tr>
                    @php
                    $i += 1;
                    @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "full_numbers",
                "scrollCollapse": true,
                "scrollY": "250px",
            });
        });
    </script>
    @endsection

    @section('footer')
    <footer>
        <div class="footer-left flex">
            <div class="footer-image">
                <img id="little-image" src="{{ $data['album']['image']['url'] }}" width="60" height="60" alt="">
            </div>
            <div class="footer-message">
                <p id="little-song-topic">{{ $data['name'] }}</p>
                <p id="little-song-artist">{{ $data['artists'][0]['name'] }}</p>
            </div>
        </div>
        <div class="footer-right flex">
            <img src="{{ asset('img/shuffle.@2x.png') }}" id="btn-shuffle" alt="">
            <img src="{{ asset('img/previous.@2x.png') }}" id="btn-previousSong" alt="">
            <img src="{{ asset('img/play.@2x.png') }}" id="btn-play" alt="">
            <img src="{{ asset('img/stop@2x.png') }}" id="btn-pause" alt="" class="hide">
            <img src="{{ asset('img/next.@2x.png') }}" id="btn-nextSong" alt="">
            <img src="{{ asset('img/repeat.@2x.png') }}" id="btn-repeat" alt="">
        </div>
    </footer>
    @endsection
</body>
@php
$album_items = json_encode($data['album_items']);
@endphp
@section('script')
<!-- Scripts -->
<script>
    $(document).ready(function() {
        // get now uri
        let uri = "{{ $data['uri'] }}"
        let album_items = "{{ $album_items }}";
        album_items = JSON.parse(album_items.replace(/&quot;/g, '"'));
        let now_number = album_items.find(item => item.uri == uri).track_number;
        let max_number = album_items.length;
        let min_number = 1;

        window.onSpotifyWebPlaybackSDKReady = () => {
            // Define the Spotify Connect device, getOAuthToken has an actual token 
            // hardcoded for the sake of simplicity
            var player = new Spotify.Player({
                name: 'Roger ',
                getOAuthToken: callback => {
                    callback('BQCUnEcUidTii7_phFyESndoIcs9Z4kAGv5Uta5n-1AelSUOg-6zLSjkey_IsMErA_Whef_mqZO8CQI2UmBhcZpy51IuCYPB4k7YdL7raM9UdywcP-5O31lbZR8GNPNXA1gQy-Ay9luW-ssGTJFnK3my4szlj_dbqpFq');
                },
                volume: 0.8
            });

            // Called when connected to the player created beforehand successfully
            player.addListener('ready', ({
                device_id
            }) => {
                console.log('Ready with Device ID', device_id);

            });



            // Connect to the player created beforehand, this is equivalent to 
            // creating a new device which will be visible for Spotify Connect
            player.connect();

            function playSong() {
                $('#btn-play').addClass('hide')
                $('#btn-pause').removeClass('hide')
                // Chagne left image and content
                let topic = album_items.find(item => item.uri == uri).name;
                let artist = album_items.find(item => item.uri == uri).artists[0].name;
                $('#little-song-topic').html(topic);
                $('#little-song-artist').html(artist);

                // Play Song API
                if ($('#btn-play').hasClass('resume')) {
                    // resume Song API
                    player.resume().then(() => {
                        console.log('Resumed!');
                    });
                    $('#btn-play').removeClass('resume');
                } else {
                    console.log(1234)
                    const play = ({
                        spotify_uri,
                        playerInstance: {
                            _options: {
                                getOAuthToken,
                                id
                            }
                        }
                    }) => {
                        getOAuthToken(access_token => {
                            fetch(`https://api.spotify.com/v1/me/player/play?device_id=${id}`, {
                                method: 'PUT',
                                body: JSON.stringify({
                                    uris: [spotify_uri]
                                }),
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Authorization': `Bearer ${access_token}`
                                },
                            });
                        });
                    };

                    play({
                        playerInstance: player,
                        spotify_uri: uri,
                    });
                }

            }

            function pauseSong() {
                $('#btn-pause').addClass('hide')
                $('#btn-play').removeClass('hide')
                $('#btn-play').addClass('resume')
                player.pause().then(() => {
                    console.log('Paused!');
                });
            }

            function shuffleSong() {
                let n = parseInt((Math.random() * album_items.length) + 1);
                now_number = n;
                uri = album_items.find(item => item.track_number == n).uri;
                playSong();
            }

            function repeatSong() {
                playSong();
            }
            $('#btn-shuffle').on('click', function() {
                shuffleSong();
            });
            $('#btn-play').on('click', function() {
                playSong();

            });
            $('#btn-pause').on('click', function() {
                pauseSong();
            });

            $('#btn-nextSong').on('click', function() {
                if (now_number + 1 <= max_number) {
                    now_number += 1;
                    uri = album_items.find(item => item.track_number == now_number).uri;
                    playSong();
                }
            });

            $('#btn-previousSong').on('click', function() {
                if (now_number - 1 >= 1) {
                    now_number -= 1;
                    uri = album_items.find(item => item.track_number == now_number).uri;
                    playSong();
                }
            });

            $('#btn-repeat').on('click', function() {
                repeatSong();
            });
        };
    });
</script>
@endsection

</html>