<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

        <!-- Include Bootstrap Icons CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">

        <title>SC</title>
        @vite(['resources/js/app.js','resources/sass/app.scss'])
    </head>
    <body>
        <div class="sidebar">
            <i class="bi bi-list"></i> <!-- Sidebar icon -->
        </div>
    

    </body>
</html>
