<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('saporkren.seoDefaults.title', 'Kampung Saporkren') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <!-- Scripts -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>
        <div class="app-shell">
            <a href="#main-content" class="skip-link">
                Lewati ke konten utama
            </a>

            <div class="layout-backdrop" aria-hidden="true"></div>

            <div class="main-wrapper">
                <x-navbar />
                
                <main id="main-content">
                    {{ $slot }}
                </main>
                
                <x-footer />
            </div>
        </div>
    </body>
</html>
