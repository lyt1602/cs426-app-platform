<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupzeria</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images') }}/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('images') }}/site.webmanifest">
    @yield('head')
</head>

<body x-data="sidebar()" class="w-screen h-screen overflow-x-hidden" @resize.window="handleResize()">
    @yield('app')
    @yield('script')
</body>

</html>
