<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body class="h-screen flex items-center justify-center bg-gray-100 ">

    <div class="flex flex-col md:flex-row w-full bg-white shadow-lg rounded-lg overflow-hidden" style="height: 100%">
        <!-- Left Side (Form Section) -->
        <div class="w-1/2 w-full p-8">
            <div class="flex flex-col justify-center h-full md:px-12">
                <!-- Logo -->
                <div class="flex justify-center">
                    <img src="{{ asset('backend/assets/img/logo/logo.png') }}" alt="" width="200px"
                        height="40px" class="mb-12 flex justify-center">
                </div>
                <!-- Welcome Message -->
                <h2 class="text-2xl font-semibold text-gray-700">Bienvenido</h2>
                <h2 class="text-gray-600 mb-6 font-[800] text-[28px]">Inicia sesión</h2>

                <!-- Form -->
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Correo
                            electrónico</label>
                        <input type="email" id="email" placeholder="Ingresa tu correo electrónico"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Contraseña</label>
                        <input type="password" id="password" placeholder="Contraseña"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="text-gray-600">
                            <span class="ml-2 text-gray-600 text-sm">Recuérdame</span>
                        </label>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Olvidé mi contraseña</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-gray-800 text-white font-semibold py-2 rounded-lg hover:bg-gray-700 transition duration-200">Sign
                        In</button>
                </form>
            </div>
        </div>

        <!-- Right Side (Image Section) -->
        <div class="w-1/2 w-full h-64 md:h-auto bg-cover bg-center md:block hidden"
            style="background-image: url('https://s3-alpha-sig.figma.com/img/d212/58ce/46dcc1e11a23e11ee8c9f03cf3092870?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=hdzEbBb5lBl7SsNaaRNaingOdiciNttPfMhKKiCqgS26c04v5eV-hcbjRSigCaE0pAwuxIW9vV4nnzjCuJU8vmrdEEsBLiGFUxQlcwAVdkAhnQ9sRjhSOW6luLYRrHoKNwkC0gNQBi4NMKWBDBMMmvcFtLa1MT2SqmWvn42r36ZHJw~GRdfJrlAI29Yj2rHbV4X7PiwjvF3MICkoQrhUwGKybFR-VmoiNxfhHf3THhRYXLh8mBcOjBLIVu2PahojfmyP-qZoyB7EA9Psm5MKYqGvBTCe~CzhFRum6M31bFny3Dc3nRHzIS6e7ayxwIqwjBcJvgECaX2iCqjhKnq8-Q__');">
        </div>
    </div>

</body>

</html>
