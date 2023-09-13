<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body class="min-h-screen font-sans antialiased">

    <!-- The navbar with `sticky` and `full-width` -->
    <x-nav sticky full-width>


        <x-slot:brand class="shadow-md">
            <!-- Drawer toggle for "main-drawer" -->
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            <!-- Your logo -->
            <span class="text-xl font-semibold">My App</span>
        </x-slot:brand>

        <!-- Right side actions -->
        <x-slot:actions>
            <x-dropdown right label="localdisk" class="bg-white border-none text-lg font-normal hover:bg-white">
                <x-menu-item title="Logtout" icon="o-arrow-right-on-rectangle" class="text-base px-6" />
            </x-dropdown>
        </x-slot:actions>
    </x-nav>

    <!-- The main content with `full-width` -->
    <x-main full-width>

        <!-- It is a sidebar that works also as a drawer at small screens -->
        <!-- Note `main-drawer` reference here -->
        <x-slot:sidebar drawer="main-drawer" class="bg-white shadow !overflow-y-hidden">

            <!-- Activate menu item when route matches `link` property -->
            <x-menu activate-by-route active-bg-color="bg-white">
                <x-menu-item title="Home" icon="o-home" class="text-lg" link="###" />
                <x-menu-sub title="Post" icon="o-pencil-square" class="text-lg" link="###">
                    <x-menu-item title="List" icon="o-list-bullet" class="text-lg" />
                    <x-menu-item title="Create" icon="o-pencil-square" class="text-lg" />
                </x-menu-sub>
                <x-menu-sub title="Tag" icon="o-tag" class="text-lg" link="###">
                    <x-menu-item title="List" icon="o-list-bullet" class="text-lg" />
                    <x-menu-item title="Create" icon="o-pencil-square" class="text-lg" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        <!-- The `$slot` goes here -->
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
    @stack('script')
</body>

</html>
