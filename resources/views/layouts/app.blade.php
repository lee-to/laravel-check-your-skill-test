<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Layout</title>
</head>
<body class="antialiased">
    <!-- TODO Blade Задание 3: Подключите view с меню -->
    <!-- shared/menu.blade.php -->
    @include('shared.menu')

    @yield('content')
</body>
</html>
