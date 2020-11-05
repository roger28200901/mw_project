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
    <footer>
        <div class="footer-left flex">
            <div class="footer-image">
                <img src="{{ $data['album']['image']['url'] }}" width="60" height="60" alt="">
            </div>
            <div class="footer-message">
                <p>{{ $data['name'] }}</p>
                <p>{{ $data['artists'][0]['name'] }}</p>
            </div>
        </div>
        <div class="footer-right flex">
            <img src="{{ asset('img/shuffle.@2x.png') }}" alt="">
            <img src="{{ asset('img/previous.@2x.png') }}" alt="">
            <img src="{{ asset('img/play.@2x.png') }}" alt="">
            <img src="{{ asset('img/next.@2x.png') }}" alt="">
            <img src="{{ asset('img/repeat.@2x.png') }}" alt="">
        </div>
    </footer>
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


</body>


@section('script')
<script>

</script>
@endsection

</html>