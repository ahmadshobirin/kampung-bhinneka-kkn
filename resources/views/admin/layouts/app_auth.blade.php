<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        <title>{{ config('app.name') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/fontawesome.css') }}">
    </head>
    <body class="login bg-white">
        @yield('content')
        <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
        @yield('script')
    </body>
</html>