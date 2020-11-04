<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Scripts -->
    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Spotify
            </div>
            <div class="links">

            </div>
        </div>
    </div>
</body>
<script>
    // Called when the Spotify Web Playback SDK is ready to use
    window.onSpotifyWebPlaybackSDKReady = () => {


        // Define the Spotify Connect device, getOAuthToken has an actual token 
        // hardcoded for the sake of simplicity
        var player = new Spotify.Player({
            name: 'Roger ',
            getOAuthToken: callback => {
                callback('BQDB0da-VolgZT4GLpdOga_phUQNNU2bwqtC-gLBTxfpJgWWIhi6q5UoekgGUK3vc6ml4aHzO5mktHEAKBWNg2KZSJSnXgPl5MxNbVm1ibLo7nrnnyK1PgoJNZ8xeKaxAp_ywYv1J9tyICouqiMVReUIVkT6lFH-Ufm8');
            },
            volume: 0.5
        });

        // Called when connected to the player created beforehand successfully
        player.addListener('ready', ({
            device_id
        }) => {
            console.log('Ready with Device ID', device_id);

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
                spotify_uri: 'spotify:track:2VxeLyX666F8uXCJ0dZF8B',
            });
        });



        // Connect to the player created beforehand, this is equivalent to 
        // creating a new device which will be visible for Spotify Connect
        player.connect();

    };
</script>

</html>