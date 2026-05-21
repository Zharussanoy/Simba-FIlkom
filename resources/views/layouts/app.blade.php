<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIMBA' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">

    {{-- NAVBAR KAMU --}}
    @include('components.navbar-app')

    {{-- CONTENT --}}
    <main class="pt-6">
        {{ $slot }}
    </main>

</body>
</html>