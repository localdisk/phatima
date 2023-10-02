<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body class="min-h-screen font-sans antialiased overflow-y-hidden">

    <!-- The navbar with `sticky` and `full-width` -->
    <x-nav sticky full-width>

        <x-slot:brand>
            <!-- Drawer toggle for "main-drawer" -->
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            <!-- Your logo -->
            {{ config('app.name') }}
        </x-slot:brand>

        <!-- Right side actions -->
        <x-slot:actions>
            @auth
                <x-dropdown label="{{ auth()->user()->name }}" right class="bg-white border-none font-normal text-base">
                    <form method="POST" action="{{ route('admin.logout') }}" x-data>
                        @csrf

                        <x-menu-item title="Logout" icon="o-arrow-right-on-rectangle" @click.prevent="$root.submit();"
                            class="px-6 text-base" />
                    </form>
                </x-dropdown>
            @endauth
        </x-slot:actions>
    </x-nav>

    <!-- The main content with `full-width` -->
    <x-main full-width>

        <!-- It is a sidebar that works also as a drawer at small screens -->
        <!-- Note `main-drawer` reference here -->
        <x-slot:sidebar drawer="main-drawer" class="border-r">
            @include('includes.admin.menu')

        </x-slot:sidebar>

        <!-- The `$slot` goes here -->
        <x-slot:content class="!p-0 bg-gray-50">
            <div class="flex justify-center mt-12">
                <x-card class="lg:w-3/4 w-5/6">
                    {{ $slot }}
                </x-card>
            </div>
        </x-slot:content>
    </x-main>
    @stack('scripts')
</body>

</html>
