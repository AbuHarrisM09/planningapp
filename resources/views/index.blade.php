<!DOCTYPE html>
<html :class="{ 'theme-dark': !dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('/assets-tlw/css/tailwind.output.css')}}" />
    @if(!Request::is('home') && !Request::is('rencana-kegiatan') && !Request::is('rencana-belanja'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" defer></script>
    @endif
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{asset('assets-tlw/js/init-alpine.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{asset('assets/js/charts-lines.js')}}" defer></script>
    <script src="{{asset('assets/js/charts-pie.js')}}" defer></script>
    <style>
        *::-webkit-scrollbar {
            width: 8px;
            overflow-x: scroll;
        }

        *::-webkit-scrollbar-track {
            background: rgba(255,255,255,var(--bg-opacity));
            border-radius: 8px;
            overflow-x: scroll;
        }

        *::-webkit-scrollbar-thumb {
            background-color: rgba(126,58,242,var(--bg-opacity));
            border-radius: 8px;
            overflow-x: scroll;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layout.sidebar')
        <!-- Last Backdrop -->

        <!-- Main Content -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Header -->
            @include('layout.header')
            <!-- Last Header -->

            <!-- Content -->
            <main class="h-full overflow-y-auto">
                @yield('content')
            </main>
            <!-- Last Content -->
        </div>
    </div>
</body>

</html>