<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'def')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1 class="text-3xl font-bold underline text-orange-500">
        Hello world!
    </h1>
    <div class="text-orange-50"> hoge</div>
</body>

</html>
