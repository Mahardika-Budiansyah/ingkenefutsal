@include('sign-in')
@include('sign-up')
@include('user.partials.dropdownUser')
@include('user.partials.cart')

<nav class="bg-white border-teal-200 fixed top-0 w-full z-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-6">
        <a href="{{ route('homepage') }}" class="flex items-center space-x-3">
            <img src="{{ url('build\assets\img\ingkenefutsal\ingkenefutsal-full.png') }}" class="h-12"
                alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0">
            @if (Auth::guard('web')->check() && Auth::guard('web')->user()->name)
                <button data-collapse-toggle="navbar-cart" type="button"
                    class="ni ni-cart text-teal-600 items-center p-2 w-10 h-10 justify-center text-sm rounded-lg flex md:flex lg:hidden hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-teal-200"
                    aria-controls="navbar-cart" aria-expanded="false">
                    <span class="sr-only">Cart</span>
                </button>
                <button id="dropdownUser" data-dropdown-toggle="User"
                    class="capitalize text-gray-900 hover:text-teal-700 bg-transparent hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-teal-100 font-medium rounded-lg text-sm px-4 py-2 text-center items-center hidden md:hidden lg:inline-flex"
                    type="button">
                    {{ Auth::guard('web')->user()->name }}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
            @else
                <div class="flex gap-x-0.5">
                    <button data-collapse-toggle="navbar-cart" data-modal-toggle="navbar-cart" type="button"
                        class="ni ni-cart mx-3 text-teal-600 items-center p-2 w-10 h-10 justify-center text-sm rounded-lg flex md:flex hover:bg-teal-100 focus:outline-none focus:ring-4 focus:ring-teal-200"
                        aria-controls="navbar-cart" aria-expanded="false">
                        <span class="sr-only">Cart</span>
                        <span
                            class="bg-red-700 text-white rounded-full px-1 ml-4 mb-4 -pt-1 align-middle justify-center text-xs absolute">0</span>
                    </button>
                    <button data-modal-target="sign-in-modal" data-modal-toggle="sign-in-modal"
                        class="mr-3 text-teal-500 hover:text-teal-600 bg-transparent  hover:bg-teal-100 focus:ring-4 focus:outline-none focus:ring-teal-100 font-medium rounded-lg text-sm px-4 py-2 text-center items-center hidden md:hidden lg:flex"
                        type="button">
                        Masuk
                    </button>
                    <button data-modal-target="sign-up-modal" data-modal-toggle="sign-up-modal"
                        class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 text-center hidden md:hidden lg:flex"
                        type="button">
                        Daftar
                    </button>
                </div>
            @endif


            <button data-collapse-toggle="navbar-cta" type="button"
                class="items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg flex md:flex lg:hidden hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-teal-200"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5 text-teal-500 hover:text-teal-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden md:hidden lg:flex w-full md:w-auto md:order-1 divide-y-2 divide-teal-100"
            id="navbar-cta">
            <ul
                class="flex flex-col font-medium text-center p-4 md:p-0 mt-4 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-white bg-teal-500 rounded md:bg-transparent md:text-teal-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">Sewa
                        Lapangan</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">Tentang
                        Kami</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">Hubungi
                        Kami</a>
                </li>
            </ul>

            @if (Auth::guard('web')->check() && Auth::guard('web')->user()->name)
                <div class="py-2 lg:hidden">
                    <ul
                        class="flex flex-col font-medium text-center px-4 md:p-0 mt-4 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                        <li>
                            <a href="#" id="toggleUser"
                                class="block py-2 px-3 md:p-0 capitalize text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">
                                {{ Auth::guard('web')->user()->name }}
                            </a>
                        </li>
                        <li class="masukIdContainer">
                            <a href="#" id="MasukIdUser"
                                class="block py-2 pl-5 pr-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">
                                Dashboard
                            </a>
                        </li>
                        <li class="masukIdContainer">
                            <a href="#" id="MasukIdPartner"
                                class="block py-2 pl-5 pr-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">
                                Profile
                            </a>
                        </li>
                        <li class="masukIdContainer">
                            <a href="#" id="MasukIdPartner"
                                class="block py-2 pl-5 pr-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-500">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <div
                    class="py-2 lg:hidden flex flex-col font-medium text-center px-4 md:p-0 mt-4 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <button href="#" data-modal-target="sign-in-modal" data-modal-toggle="sign-in-modal"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-600">
                        Masuk
                    </button>
                    <button href="#" data-modal-target="sign-up-modal" data-modal-toggle="sign-up-modal"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-teal-100 md:hover:bg-transparent md:hover:text-teal-600">
                        Daftar
                    </button>
                </div>
            @endif


        </div>
    </div>
</nav>

<script>
    // JavaScript to toggle between Masuk and Masukid
    document.getElementById('toggleUser').addEventListener('click', function() {
        var masukidContainers = document.getElementsByClassName('masukIdContainer');
        for (var i = 0; i < masukidContainers.length; i++) {
            masukidContainers[i].classList.toggle('hidden');
        }
    });
</script>
