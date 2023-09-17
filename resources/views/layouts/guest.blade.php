<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" /> --}}
    @stack('css')
</head>

<body class="min-h-screen font-sans antialiased">
    @yield('content')

    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    @stack('script')
</body>

</html>
