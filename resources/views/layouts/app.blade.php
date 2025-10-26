<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'HyperScale - Platform PaaS Terpercaya')</title>
    <meta name="description" content="@yield('description', 'HyperScale menyediakan solusi Platform as a Service (PaaS) terdepan untuk mempercepat pengembangan dan deployment aplikasi Anda.')">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js with Collapse Plugin -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen bg-white text-gray-900">
    @include('components.navigation')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/628889623663?text=Halo%20HyperScale,%20saya%20tertarik%20dengan%20layanan%20PaaS%20Anda"
       class="whatsapp-float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="whatsapp-tooltip">Chat WhatsApp</span>
    </a>

    @stack('scripts')
</body>
</html>
