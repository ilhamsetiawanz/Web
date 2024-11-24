<aside id="application-sidebar-brand" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400 bg-white left-sidebar transition-all duration-300">
    <!-- Start Vertical Layout Sidebar -->
    <div class="p-5">
        <a href="/" class="text-nowrap">
            Admin TamanSehat
        </a>
    </div>
    <!-- Main Content Wrapper - Takes full height minus header and logout -->
    <div class="flex flex-col h-[calc(100vh-80px)]">
        <!-- Scrollable Menu Section -->
        <div class="scroll-sidebar flex-grow" data-simplebar="">
            <div class="px-6 mt-8">
                <nav class="w-full flex flex-col sidebar-nav">
                    <ul id="sidebarnav" class="text-gray-600 text-sm">
                        <li class="text-xs font-bold pb-4">
                            <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                            <span>MENU</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="{{route ('Admin')}}">
                                <i class="ti ti-home text-xl"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="{{route ('data-gejala')}}">
                                <i class="ti ti-list-details text-xl"></i>
                                <span>Data Gejala</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="{{route ('data-penyakit')}}">
                                <i class="ti ti-virus text-xl"></i>
                                <span>Data Penyakit</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="{{route('data-aturan')}}">
                                <i class="ti ti-settings text-xl"></i>
                                <span>Data Aturan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="{{route('laporan-bulanan')}}">
                                <span class="material-symbols-outlined">
                                    lab_profile
                                </span>
                                <span>Hasil Diagnosis</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <!-- Logout Button - Fixed at bottom -->
        <div class="mt-auto border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}" class="px-6 py-4">
                @csrf
                <button type="submit" class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center text-red-600 hover:bg-red-50">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>