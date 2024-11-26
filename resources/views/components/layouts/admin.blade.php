<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HMS' }} - ROMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @stack('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <div class="flex min-h-screen bg-gray-100" x-data="{ open: false, ap: false, rec: false, labShow: false, specialization: false, showSideNav: true }">
        <!-- Sidebar -->
        @include('backend.includes.sidenav')

        <!-- Main Content -->
        <main class="flex-1 p-6 w-full overflow-hidden ">
            <!-- Header -->
            @include('backend.includes.topnav')

            {{ $slot }}

            @include('includes.content')
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        if (document.getElementById("appointment_time")) {
            flatpickr("#appointment_time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i", // 24-hour format
                time_24hr: true, // Enable 24-hour time format
                onChange: function(selectedDates, dateStr) {}
            });
        }
    </script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
