<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @PwaHead --}}
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@laragear/webpass@2/dist/webpass.js" defer></script>
    <style>
        body {
            background-color: #cfd8dc;
        }

        #background {
            background: linear-gradient(132deg, #000000, #00ff00, #0000ff, #e60073, #ff0000, #ffffff);
            background-size: 400% 400%;
            animation: BackgroundGradient 5s ease infinite;
            width: 100%;
            height: 25vh;
        }

        #custom-h1 {
            position: absolute;
            left: 50%;
            top: 16%;
            transform: translateX(-50%) translateY(-50%);
            color: #fff;
            text-align: center;
            font-size: 3em;
            padding: 5px;
        }

        @keyframes BackgroundGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @yield('specific-style')
</head>

<body>
    @include('_navbar')
    <div id="background">
        <h1 id="custom-h1">PassPal</h1>
    </div>
    <div class="container">
        @yield('content')
    </div>
    @yield('specific-script')
    {{-- @RegisterServiceWorkerScript --}}
</body>

</html>
