<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="..\build\assets\img\ingkenefutsal\ingkenefutsal-icon.png" />
    <link rel="icon" type="image/png" href="..\build\assets\img\ingkenefutsal\ingkenefutsal-icon.png" />
    <title>Ingkenefutsal Web Magelang | @yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <!-- Nucleo Icons -->
    <link href="../build/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../build/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../build/assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">

    @include('sweetalert::alert')
    @yield('content')

    <script>
        var imageSources = [
            '../build/assets/img/futsal-potrait-2.jpg',
            '../build/assets/img/futsal-potrait-3.jpg',
            '../build/assets/img/futsal-potrait-4.jpg',
        ];

        var currentImageIndex = 0;
        var changingImage = document.getElementById('changingImage');

        function changeImage() {
            changingImage.src = imageSources[currentImageIndex];
            currentImageIndex = (currentImageIndex + 1) % imageSources.length;
        }

        // Ganti gambar setiap 5 detik (5000 milidetik)
        setInterval(changeImage, 5000);
    </script>

    <!-- plugin for scrollbar  -->
    <script src="../build/assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- main script file  -->
    <script src="../build/assets/js/jquery.min.js" async></script>
    <script src="../build/assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</body>

</html>