<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4f7f6] font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md space-y-6">
            <!-- Card de login -->
           <div class="bg-white rounded-lg shadow-md px-6 py-8">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>
