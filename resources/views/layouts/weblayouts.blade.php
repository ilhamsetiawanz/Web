<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-ybQh2+Gdqgt0/n8vO2PckCozk4P5D6e8ZqEL1fpJZw=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <header class="bg-white shadow">
        @include('components.navbarWeb')
    </header>

    <!-- Hero Section -->
    @yield('heroJumbotron')

    <!-- Content Section -->
    <section class="container mx-auto py-10 px-6">
        @yield('body')
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-gray-500">&copy; TamanSehat 2024 copyright all rights reserved</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="hover:text-gray-700"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-gray-700"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-gray-700"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script for Mobile Menu -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');

        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
