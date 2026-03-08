<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen flex flex-col">

<header class="px-10 h-15 bg-linear-to-r from-cyan-500 to-cyan-800 text-white flex items-center text-2xl justify-between gap-6 text-ellipsis">
    @include('includes.header')
</header>

<main class="flex-1 flex items-center justify-center py-6">
    @yield('main')
</main>

<footer class="w-full flex px-10 py-4 flex-col bg-stone-400 text-white">
    @include('includes.footer')
</footer>
</body>
</html>
