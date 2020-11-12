<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MW_Project</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}" crossorigin="anonymous">


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/datatables.min.js"></script>

    <!-- Animation Master For Transition -->
    <!-- animsition.css -->
    <link rel="stylesheet" href="{{ asset('animation-master/dist/css/animsition.min.css') }}">
    <!-- animsition.js -->
    <script src="{{ asset('animation-master/dist/js/animsition.min.js') }}"></script>


    <!-- App Styles -->
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">


    <script src="https://sdk.scdn.co/spotify-player.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search fill">
        <div class="nav-container">
            <!-- left side -->
            <div class="flex align-center">
                <img src="{{ asset('img/MW logo@2x.png') }}" alt="" onclick="location.href='{{ route('index') }}'">
                <!-- <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button> -->
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="https://github.com/roger28200901/mw_project">Help</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                            Download
                        </a>
                        <!-- <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div> -->
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#">Sign up</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#">Sign in</a>
                    </li>
                </ul>
                <form class="form-inline mr-auto" target="_self" style="margin-left: 2rem;">
                    <div class="form-group">
                        <label for="search-field" style="margin-right: 1rem;">
                            <i class="fa fa-search"></i>
                        </label>
                        <input class="form-control search-field" onsearch="searchFunction()" id="searchInput" type="search" name="search" placeholder="Search..."></div>
                </form>
            </div>
            <!-- right side -->

            <ul class="ul-icon flex justify-center align-center">
                <li class="li-icon">
                    <a href="https://www.facebook.com/profile.php?id=100001055047638">
                        <i class="fab fa-facebook-f icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="#">
                        <i class="fab fa-twitter icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="https://www.instagram.com/chen.yunhong/">
                        <i class="fab fa-instagram icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="https://www.google.com/">
                        <i class="fab fa-google icon"></i>
                    </a>
                </li>
            </ul>


        </div>
    </nav>

    <main>
        <div class="fadeIn">

        </div>
        @yield('main')

    </main>
    @yield('footer')
    <script>
        $(document).ready(function() {
            // $(".animsition").animsition({
            //     inClass: 'fade-in-down-lg',
            //     outClass: 'fade-out-down-lg',
            //     inDuration: 1500,
            //     outDuration: 800,
            //     linkElement: '.animsition-link',
            //     // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
            //     loading: true,
            //     loadingParentElement: 'body', //animsition wrapper element
            //     loadingClass: 'animsition-loading',
            //     loadingInner: '', // e.g '<img src="loading.svg" />'
            //     timeout: false,
            //     timeoutCountdown: 3000,
            //     onLoadEvent: true,
            //     browser: ['animation-duration', '-webkit-animation-duration'],
            //     // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
            //     // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
            //     overlay: false,
            //     overlayClass: 'animsition-overlay-slide',
            //     overlayParentElement: 'body',
            //     transition: function(url) {
            //         window.location.href = url;
            //     }
            // });


        });

        function searchFunction() {
            var x = document.getElementById("searchInput");
            location.href = "{{ url('reveal/')}}" + '/' + x.value;
        }
    </script>

    @yield('script')
</body>

</html>