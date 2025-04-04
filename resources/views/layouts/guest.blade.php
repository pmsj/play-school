<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Nanhe Kadam') }}</title>
     
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- wireui -->
        <wireui:scripts />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
   
    </head>
    <body class="font-sans antialiased bg-base2">
        <div class="min-h-screen">
    
                @livewire('navigation-menu')
       

            <!-- Page Heading -->
            @if (isset($header))
                <header class="text-slate-800 bg-cardBackground3">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>
        </div>


    <!-- important! livewirescriptConfig is beign used by custom Alpine directive - humanDate -->
        @livewireScriptConfig 
    </body>
</html>
