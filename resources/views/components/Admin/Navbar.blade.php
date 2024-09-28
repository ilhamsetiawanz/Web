<aside id="application-sidebar-brand" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400 bg-white left-sidebar transition-all duration-300">
    <!-- Start Vertical Layout Sidebar -->
    <div class="p-5">
        <a href="/" class="text-nowrap">
            Admin TamanSehat
        </a>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
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

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center" href="./artikel.html">
                            <i class="ti ti-file-text text-xl"></i>
                            <span>Artikel</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
