<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MW_Project</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


    <!-- Animation Master For Transition -->
    <!-- animsition.css -->
    <link rel="stylesheet" href="{{ asset('animation-master/dist/css/animsition.min.css') }}">
    <!-- animsition.js -->
    <script src="{{ asset('animation-master/dist/js/animsition.min.js') }}"></script>


    <!-- App Styles -->
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">




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
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                            Download
                        </a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
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
                        <input class="form-control search-field" type="search" name="search" placeholder="Search..." id="search-field"></div>
                </form>
            </div>
            <!-- right side -->

            <ul class="ul-icon flex justify-center align-center">
                <li class="li-icon">
                    <a href="#">
                        <i class="fab fa-facebook-f icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="#">
                        <i class="fab fa-twitter icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="#">
                        <i class="fab fa-instagram icon"></i>
                    </a>
                </li>
                <li class="li-icon">
                    <a href="#">
                        <i class="fab fa-google icon"></i>
                    </a>
                </li>
            </ul>


        </div>
    </nav>

    <main class="animsition" data-animsition-in-class="fade-in-right-lg" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-right-lg" data-animsition-out-duration="800">

        @yield('main')
    </main>
    <script>
        $(document).ready(function() {
            $(".animsition").animsition({
                inClass: 'fade-in-right-lg',
                outClass: 'fade-out-right-lg',
                inDuration: 1500,
                outDuration: 800,
                linkElement: '.animsition-link',
                // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
                loading: true,
                loadingParentElement: 'body', //animsition wrapper element
                loadingClass: 'animsition-loading',
                loadingInner: '', // e.g '<img src="loading.svg" />'
                timeout: false,
                timeoutCountdown: 5000,
                onLoadEvent: true,
                browser: ['animation-duration', '-webkit-animation-duration'],
                // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
                // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
                overlay: false,
                overlayClass: 'animsition-overlay-slide',
                overlayParentElement: 'body',
                transition: function(url) {
                    window.location.href = url;
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>