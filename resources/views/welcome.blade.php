<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="text-2xl font-bold text-gray-800">HotCoffee</div>

                <!-- Menu (for larger screens) -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Artikel</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Diagnosis</a>
                </div>

                <!-- Login/Sign Up Button (for larger screens) -->
                <div class="hidden md:flex space-x-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Login</button>
                    <button class="bg-transparent border border-blue-600 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-600 hover:text-white">Sign Up</button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="menu-btn" class="text-gray-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="flex flex-col space-y-2 px-4 py-2">
                <a href="#" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Artikel</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Diagnosis</a>
                <div class="space-y-2 pt-2 border-t border-gray-200">
                    <button class="bg-blue-600 text-white w-full px-4 py-2 rounded-md hover:bg-blue-700">Login</button>
                    <button class="bg-transparent border border-blue-600 text-blue-600 w-full px-4 py-2 rounded-md hover:bg-blue-600 hover:text-white">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Tailwind Script -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
