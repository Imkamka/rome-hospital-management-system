<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HMS' }} - ROMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen bg-gray-100">

    @include('includes.navbar')
    <main class="flex-grow">
        {{ $slot }}
    </main>
    @include('includes.footer')
    @livewireScripts
    <script>
        document.getElementById('mobile-menu-button').onclick = () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        };
    </script>

</body>

</html>
