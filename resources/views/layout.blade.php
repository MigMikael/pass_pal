<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @yield('specific-style')
</head>

<body>
    
    @include('_navbar')
    <div class="container-fluid mt-5 p-5 bg-primary text-white text-center">
        <h1>PassPal</h1>
        <p>My own password manager.</p>
    </div>

    <div class="container">
        @yield('content')
    </div>
    @yield('specific-script')
</body>

</html>
