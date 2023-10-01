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

<body class="min-h-screen font-sans antialiased">

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

            <!-- Activate menu item when route matches `link` property -->
            {{-- <x-menu activate-by-route>
                <x-menu-item title="Home" icon="o-home" link="{{ route('admin.dashboard') }}" />
                <x-menu-sub title="User" icon="o-user">
                    <x-menu-item title="List" icon="o-list-bullet" link="{{ route('admin.users') }}" />
                    <x-menu-item title="Create" icon="o-pencil-square" link="{{ route('admin.users.create') }}" />
                </x-menu-sub>
                <x-menu-sub title="Post" icon="o-pencil">
                    <x-menu-item title="Create" icon="o-pencil-square" link="{{ route('admin.posts.create') }}" />
                </x-menu-sub>
                <x-menu-sub title="Tag" icon="o-tag">
                    <x-menu-item title="List" icon="o-list-bullet" link="{{ route('admin.tags') }}" />
                    <x-menu-item title="Create" icon="o-pencil-square" link="{{ route('admin.register.tag') }}" />
                </x-menu-sub>
            </x-menu> --}}

            <ul class="menu rounded-box">
                <li>
                    <a href="{{ route('admin.dashboard') }}" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <details open>
                        <summary>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            User
                        </summary>
                        <ul>
                            <li>
                                <a href="{{ route('admin.users') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    List
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.create') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    Create
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details open>
                        <summary>
                            POST
                        </summary>
                        <ul>
                            <li>
                                <a href="#" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    List
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.posts.create') }}" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    Create
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
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
