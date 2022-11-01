<!DOCTYPE html>
<html lang="ja">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.15.13/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.15.13/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.15.13/js/uikit-icons.min.js"></script>
    <style>
        .uk-navbar-nav>li>a,
        .uk-button,
        .uk-table th {
            text-transform: none;
        }
    </style>
</head>
<body>

@include('components.alert')
@include('components.header')

<main>
    @yield('main')
</main>
</body>
</html>
