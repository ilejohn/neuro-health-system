<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <style media="screen">
    html,body {
      height: 100%;
      }
    </style>
</head>
<body>
  @include('layouts.nav')
    <div class="container-fluid h-100">
      <div class="row h-100">
        <div class="col-sm-3 mr-5 bg-success text-white">
            <h3 class="text-center">Left-side Nav</h5>
        </div>
        <div class="col-sm-8 py-5">
            @yield('content')
        </div>
      </div>
    </div>
</body>
</html>
