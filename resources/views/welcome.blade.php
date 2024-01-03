{{-- <!DOCTYPE html>
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
</html> --}}
@extends('layouts.home')
@section('content')
<header>
    <div class="container">
      <img src="logo.png" alt="شعار الجمعية">
      <h1>جمعية الحاسوب العلمية</h1>
    </div>
  </header>
  <main class="container">
    <form action="/login" method="post">
      <div class="form-group">
        <label for="email">البريد الإلكتروني</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">كلمة المرور</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">تسجيل دخول</button>
    </form>
  </main>
  <footer>
    <div class="container">
      <a href="#">حول الموقع</a>
    </div>
  </footer>
@endsection
