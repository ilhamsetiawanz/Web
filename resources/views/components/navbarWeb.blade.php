<div class="container mx-auto flex justify-between items-center py-4 px-6">
    <a href="#" class="text-2xl font-bold">TanamSehat</a>
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
        <a href="{{route('Login')}}">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
        </a>
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
        </div>
    </nav>
</div>