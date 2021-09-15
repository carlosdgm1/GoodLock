<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>
    <script src="{{ asset('js/Unreal Media Server WebRTC player_files/unrealwebrtcplayer.js.descarga') }}"></script>
    <script src="{{ asset('js/Unreal Media Server WebRTC player_files/webrtcadapter.js.descarga') }}"></script>

    <script type="text/javascript">
        var webrtcPlayer = null;
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!--Script BS-->
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <script type="text/javascript">
        webrtcPlayer = new UnrealWebRTCPlayer("remoteVideo", "placa", "", "192.168.100.132", "5119", false, true, "tcp");

        webrtcPlayer2 = new UnrealWebRTCPlayer("remoteVideo2", "frente", "", "192.168.100.132", "5119", false, true, "tcp");

        //Comment out next line not to start playing when webpage loads. Then user will need to click on Play button to play; you may want to use a video element with overlayed Play button - check out our SDK for sample webpages.
        webrtcPlayer
        .Play(); //Start playing automatically when webpage loads. Notice that video element has a "muted" attribute; this is video-only stream anyway. A muted attribute helps to overcome Chrome's autoplay policy, and is not always needed, as described in http://www.umediaserver.net/phpBB3/viewtopic.php?f=29&t=3578
        webrtcPlayer2.Play();
    </script>

</body>

</html>
