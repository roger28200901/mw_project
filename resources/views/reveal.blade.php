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
    <div id="card-container" class="container flex">
        @foreach($datas as $data)
        <div class="card">
            <div class="card-image">
                <img src="{{$data['image']}}" width="300" alt="">
            </div>
            <div class="card-text">
                <span class="date">{{ $data['artist_name'] }}</span>
                <h2>{{ $data['album_name'] }}</h2>
                <p>
                    <img src="{{ asset('img/play.@2x.png') }}" alt="">
                </p>
            </div>
            <div class="card-stats">
                <img width="300" height="50" src="{{ asset('img/reveal-play.png') }}" alt="">
                <div class="stat">
                    {{ $data['song_name'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection


</body>


@section('script')
<script>
    $(document).ready(function() {
        var startX = null;
        var left = 0;

        $('#card-container').on('dragstart', function() {
            startX = event.screenX;
        })
        $('#card-container').on('dragover', function() {
            if (left <= 0) {
                left = 1;
                return false;
            } else {
                left += event.screenX - startX;
                console.log(left);
                $('.card').css('left', left + 'px');
            }
        });
    });
</script>
@endsection

</html>