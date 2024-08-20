<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiCabai Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold">SiCabai</a>
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            <!-- Navbar Links -->
            <nav class="hidden md:flex space-x-4">
                <a href="#" class="hover:text-gray-700">Home</a>
                <a href="#" class="hover:text-gray-700">Artikel</a>
                <a href="#" class="hover:text-gray-700">Diagnosa</a>
            </nav>
            <div class="hidden md:flex space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Sign Up</button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="menu" class="hidden md:hidden bg-white shadow-lg">
            <nav class="px-6 py-4 space-y-2">
                <a href="#" class="block text-gray-700 hover:text-gray-900">Home</a>
                <a href="#" class="block text-gray-700 hover:text-gray-900">Artikel</a>
                <a href="#" class="block text-gray-700 hover:text-gray-900">Diagnosa</a>
                <div class="space-y-2 mt-4">
                    <button class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
                    <button class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Sign Up</button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-6">
            <div class="flex-1">
                <h1 class="text-5xl font-bold">Make better coffee</h1>
                <p class="text-xl text-gray-600 mt-4">Why learn how to blog?</p>
            </div>
            <div class="flex-1">
                <img src="illustration.png" alt="Illustration" class="w-full h-auto">
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="container mx-auto py-10 px-6">
        <!-- Large Card After Jumbotron -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
            <img src="large-card-image.jpg" alt="Main Article" class="w-full h-64 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Long Established</h2>
                <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted by the readable content...</p>
                <div class="mt-4 text-gray-500">May 20th 2020</div>
                <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
            </div>
        </div>

        <!-- Grid with 3 Small Cards and 1 Large Card -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="article1.jpg" alt="Article" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Long Established</h3>
                    <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                    <div class="mt-4 text-gray-500">May 20th 2020</div>
                    <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="article2.jpg" alt="Article" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Long Established</h3>
                    <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                    <div class="mt-4 text-gray-500">May 20th 2020</div>
                    <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="article3.jpg" alt="Article" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">Long Established</h3>
                    <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted...</p>
                    <div class="mt-4 text-gray-500">May 20th 2020</div>
                    <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
        </div>

        <!-- Single Large Card Below -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-6">
            <img src="large-article-image.jpg" alt="Large Article" class="w-full h-64 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-bold">What is Lorem Ipsum?</h2>
                <p class="text-gray-600 mt-2">It is a long established fact that a reader will be distracted by the readable content...</p>
                <div class="mt-4 text-gray-500">May 20th 2020</div>
                <a href="#" class="mt-2 inline-block text-blue-500 hover:underline">Read more</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-gray-500">&copy; SiCabai 2020 copyright all rights reserved</p>
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
