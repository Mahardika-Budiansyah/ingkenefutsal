<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="build\assets\img\ingkenefutsal\ingkenefutsal-icon.png" />
    <link rel="icon" type="image/png" href="build\assets\img\ingkenefutsal\ingkenefutsal-icon.png" />
    <title>Ingkenefutsal Web Magelang | @yield('title') </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../../build/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../build/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../../build/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    {{-- <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div> --}}

    @include('layouts.partials.navbar')

    @if(request()->is('/'))
        @includeIf('layouts.partials.jumbotronHomepage')
    @else
        @includeIf('layouts.partials.jumbotronDashboard')
    @endif

    @yield('content')

    @include('layouts.partials.footer')



    <!-- plugin for charts  -->
    <script src="../build/assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="../build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- main script file  -->
    <script src="../../build/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    
    
</body>
</html>