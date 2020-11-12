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

    @endsection

</body>

</html>