<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Set the theme class before first paint so there's no light-then-dark flash. --}}
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var isDark = stored ? stored === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (isDark) document.documentElement.classList.add('dark');
            } catch (e) {}
        })();
    </script>

    <x-layout.seo :seo="$seo ?? []" />

    <link rel="icon" href="{{ config('company.favicon') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">

    <x-navigation.navbar />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-navigation.footer />

</body>
</html>
