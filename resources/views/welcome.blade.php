<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SC</title>
        @vite(['resources/js/app.js','resources/sass/app.scss'])
    </head>
    <body >
        <h1 class="wl"> Welcome back from laravel</h1>
    </body>
</html>
