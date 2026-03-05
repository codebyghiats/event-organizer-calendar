<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/outline/heroicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/schoolplanner.png') }}">
</head>

<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden">

<x-navbar></x-navbar>

<x-hero></x-hero>

<x-today></x-today>

<x-features></x-features>

<x-cta></x-cta>

<x-footer></x-footer>


</body>
</html>