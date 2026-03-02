<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'My App' }}</title>

    @vite('resources/css/app.css')
</head>
<body class="font-sans">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Content --}}
    <main class="max-w-7xl mx-auto p-4">
        @yield('content')
    </main>

</body>
</html>