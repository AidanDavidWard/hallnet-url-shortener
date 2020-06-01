<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HB-BIT @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css">

        <script type="text/javascript" src="/js/app.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img id="logo" src="images/logo.png">
        </div>
        <div class="container content p-3">
            @yield('content')
        </div>
    </body>
</html>
