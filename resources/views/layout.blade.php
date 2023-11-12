<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="developed for Poulstar HTML, CSS, JS, education">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Poulstar">
    <title>@yield('title', 'Website')</title>

    <link rel="shortcut icon" href="{{ url('/IMAGE/logo/TopBarLogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ url('/CSS/Main.css') }}"/>
    @yield('header')


</head>
<body>
@include('partials.nav')

<x-errors />
<x-alert/>

@yield('content')

<script src="{{ url('/JS/Layout.js') }}"></script>
@include('partials.footer')

</body>
</html>
