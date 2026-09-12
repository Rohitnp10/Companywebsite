<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-layout.seo :seo="$seo ?? []" />

    <link rel="icon" href="{{ config('company.favicon') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col" x-cloak>

    <x-navigation.navbar />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-navigation.footer />

</body>
</html>
