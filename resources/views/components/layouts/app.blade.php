<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Theme class before first paint — avoids flash --}}
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var isDark = stored ? stored === 'dark' : true;
                if (isDark) document.documentElement.classList.add('dark');
            } catch (e) {}
        })();
    </script>

    <x-layout.seo :seo="$seo ?? []" />
    <x-layout.schema :seo="$seo ?? []" />

    <link rel="icon" href="{{ asset(config('company.favicon')) }}" sizes="any">
    <link rel="icon" href="{{ asset('assets/favicon/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <meta name="theme-color" content="#FFFFFF" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#0B0F14" media="(prefers-color-scheme: dark)">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col overflow-x-clip">

    <x-navigation.navbar />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-navigation.footer />

</body>
</html>
