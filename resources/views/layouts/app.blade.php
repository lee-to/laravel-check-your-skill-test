<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Layout</title>
</head>
<body class="antialiased">
    <!-- TODO Blade Задание 3: Подключите view с меню -->
    @include('shared.menu')
    <!-- shared/menu.blade.php -->

    @yield('content')
</body>
</html>
