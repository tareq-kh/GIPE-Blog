<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <title> GIPE 2022 - @yield('title') </title>
</head>

<body>

<div class="container">
    @yield('content')
</div>
<footer>
    <div    class="text-center">
        &copy; Global Intercultural Project Experience <script> document.write(new Date().getFullYear())</script>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"> </script>
</body>
</html>
