<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Ingkenefutsal Web Magelang | @yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../build/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../build/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../build/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">

    @yield('content')

</body>
<!-- plugin for scrollbar  -->
<script src="../build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../build/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>