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
        <a href="{{route ('Home')}}" class="hover:text-gray-700">Home</a>
        <a href="#" class="hover:text-gray-700">Artikel</a>
        <a href="{{route ('Diagnosa')}}" class="hover:text-gray-700">Diagnosa</a>
    </nav>
    <div class="hidden md:flex space-x-4">
        @if (Auth::check())
            <div class="flex justify-between items-center gap-5">
                <div>
                    <a class="flex gap-1" href="">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <span>{{Auth::user()->name}}</span>
                    </a>
                </div>
                <div>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}">
                <button class="flex items-center space-x-2 border-2 border-black text-black px-4 py-2 rounded hover:bg-gray-100">
                    <span class="material-symbols-outlined">
                        login
                    </span>
                    <span>Login</span>
                </button>
            </a>
        @endif
    </div>
    
</div>
<!-- Mobile Menu -->
<div id="menu" class="hidden md:hidden bg-white shadow-lg">
    <nav class="px-6 py-4 space-y-2">
        <a href="{{route ('Home')}}" class="block text-gray-700 hover:text-gray-900">Home</a>
        <a href="#" class="block text-gray-700 hover:text-gray-900">Artikel</a>
        <a href="{{route ('Diagnosa')}}" class="block text-gray-700 hover:text-gray-900">Diagnosa</a>
        <div class="space-y-2 mt-4">
            @if (Auth::check())
            <div class="flex flex-col gap-3">
                <div>
                    <a class="flex items-center space-x-2 border-2 border-black text-black px-4 py-2 rounded hover:bg-gray-100" href="">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <span>{{Auth::user()->name}}</span>
                    </a>
                </div>
                <div>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button class="flex items-center space-x-2 border-2 border-black text-black px-4 py-2 rounded hover:bg-gray-100 w-full" type="submit">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
            @else
                <a href="{{ route('login') }}">
                    <button class="flex items-center space-x-2 border-2 border-black text-black px-4 py-2 rounded hover:bg-gray-100">
                        <span class="material-symbols-outlined">
                            login
                        </span>
                        <span>Login</span>
                    </button>
                </a>
            @endif
        </div>
    </nav>
</div>