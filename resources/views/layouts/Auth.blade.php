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
        <title>
            @yield('title')
        </title>
    </head>

    <body class="DEFAULT_THEME bg-white">
        <main>
                    <!-- Main Content -->
                     @yield('auth')
                    <!--end of project-->
        </main>
    </body>
</html>
