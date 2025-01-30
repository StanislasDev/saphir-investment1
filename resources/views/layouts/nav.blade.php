<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <link rel="shortcut icon" href="{{ asset('assets/images/ESCa-final-usa-fond-noir-1-1024x753.ico') }}">

    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome JS -->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app">
    @if (session('status'))
        <div class="app-header fixed-top">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    @endif

    <body class="app">
        <header class="app-header fixed-top h-16">
            @include('layouts.navigation')
            <x-side-bar />
        </header><!--//app-header-->

            {{-- {{ $slot }} --}}
            <div class="app-wrapper">

                <div class="app-content pt-3 p-md-3 p-lg-4">
                    @yield('content')
                </div>
            </div>

        </div><!--//app-wrapper-->


        <!-- Javascript -->
        <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Charts JS -->
        <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/index-charts.js') }}"></script>

        <!-- Page Specific JS -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>

</html>


</body>

</html>
