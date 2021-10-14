<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  @livewireStyles
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @stack('styles')
</head>

<body>

    {{ $slot }}

  @livewireScripts
  <script src="{{ mix('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>
