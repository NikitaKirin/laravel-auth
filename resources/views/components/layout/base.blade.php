<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Auth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @livewireStyles
    @livewireScripts
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body>
    {{ $slot }}
</body>
</html>
