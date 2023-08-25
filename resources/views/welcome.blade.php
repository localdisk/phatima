<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
</head>

<body class="container mx-auto">

    {{-- @yield('content') --}}

    @php
    @endphp

    <form action="{{ route('test') }}" method="POST">
        @csrf
        <x-bladewind.select name="country" data="{{ json_encode($countries) }}" />
        <x-bladewind.button can_submit="true">subscribe now</x-bladewind.button>
    </form>
</body>

</html>
