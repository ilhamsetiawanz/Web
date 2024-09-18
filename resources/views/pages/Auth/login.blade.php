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
        <title>Sign In</title>
    </head>

    <body class="DEFAULT_THEME bg-white">
        <main>
                    <!-- Main Content -->
                    <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
                      
                        <div class="justify-center items-center w-full card lg:flex max-w-md ">
                            <div class=" w-full card-body">
                                    <a href="/" class="py-4 block text-center font-bold text-2xl">TamanSehat</a>
                                    <p class="mb-4 text-gray-500 text-sm text-center">Diagnosa Penyakit Tanaman Cabai Anda Sekarang</p>
                                <!-- form -->
                                <form action="{{ route('processLogin') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="forUsername"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Email</label>
                                    <input type="email" id="forUsername" name="email"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                    </div>
                                    <!-- password -->
                                    <div class="mb-6">
                                        <label for="forPassword"
                                        class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                                    <input type="password" id="forPassword" name="password"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                                    </div>
                                      <div class="flex flex-col justify-between">
                                        <!-- button -->
                                          <div class="grid my-6">
                                            <button type="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</button>
                                          </div>
            
                                        <div class="flex justify-center gap-2 items-center">
                                            <p class="text-base font-medium text-gray-500">New to Modernize?</p>
                                            <a href="./authentication-register.html" class="text-sm font-medium text-blue-600 hover:text-blue-700">Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                </div>
            <!--end of project-->
        </main>
    </body>
</html>
