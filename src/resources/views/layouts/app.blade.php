<!DOCTYPE html>
<html lang="ja">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss'])
</head>
<body>

@include('components.alert')
@include('components.header')

<main>
    @yield('main')
</main>

@vite(['resources/js/app.js'])
</body>
</html>
