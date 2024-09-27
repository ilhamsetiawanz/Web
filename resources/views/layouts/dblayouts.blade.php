<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png"/>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <!-- Core Css -->
        <link rel="stylesheet" href="{{asset('css/theme.css')}}" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>@yield('title')</title>
    </head>

    <body class="bg-white">
        <main>
            <!--start the project-->
            <div id="main-wrapper" class="flex">
                @include('components.Admin.Navbar')
                <div class="w-full p-5 page-wrapper overflow-hidden">
                    <!--  Header Start -->
                    @include('components.Admin.Header')
                    
                    <!--  Header End -->

                    <!-- Main Content -->
                    <main class="h-full overflow-y-auto max-w-full pt-4">
                        <div
                            class="container full-container py-5 flex flex-col gap-6"
                        >
                            @yield('content')
                            <footer>
                                <p
                                    class="text-base text-gray-500 font-normal p-3 text-center"
                                >
                                    Design and Developed by
                                    <a
                                        target="_blank"
                                        class="text-blue-600 underline hover:text-blue-700"
                                        ></a
                                    >
                                </p>
                            </footer>
                        </div>
                    </main>
                    <!-- Main Content End -->
                </div>
            </div>
            <!--end of project-->
        </main>

        {{-- <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>
        <script src="./assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
        <script src="./assets/libs/@preline/dropdown/index.js"></script>
        <script src="./assets/libs/@preline/overlay/index.js"></script>
        <script src="{{asset('js/sidebarmenu.js')}}"></script>

        <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="{{asset('js/dashboard.js')}}"></script> --}}
        @stack('scripts')
    </body>
</html>
