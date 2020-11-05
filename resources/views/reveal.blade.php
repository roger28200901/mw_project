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
        <div class="card" onclick=location.href="{{ url('playSong/'.$data['id']) }}">
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
    <div class="w3-right w3-hover-text-khaki" id="btn-previous">&#10094;</div>
    <div class="w3-left w3-hover-text-khaki" id="btn-forward">&#10095;</div>

    @endsection


</body>


@section('script')
<script>
    $(document).ready(function() {
        var length = parseInt("{{ count($datas) }}");
        var range = 0;
        if (length < 4) range = 0
        else range = -((length - 4) * 360)

        $('#btn-forward').on('click', function() {
            let leftVal = parseInt($('.card').css('left').split('px')[0]);
            if (leftVal - 360 >= range) {
                leftVal -= 360;
                $('.card').animate({
                    left: leftVal + 'px'
                }, 100);
            }
        });
        $('#btn-previous').on('click', function() {
            let leftVal = parseInt($('.card').css('left').split('px')[0]);
            if (leftVal + 360 <= 0) {
                leftVal += 360;
                $('.card').animate({
                    left: leftVal + 'px'
                }, 100);
            }
        });
    });
</script>
@endsection

</html>