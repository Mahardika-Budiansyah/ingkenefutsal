@extends('layouts.auth.mainlayouts')

@section('title', 'Sign Up Partner')
@section('content')

    <main class="h-screen">
        <section class="flex flex-row h-full">
            <div class="m-auto py-6 h-full">
                <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 rounded-2xl bg-clip-border">
                    <div class="w-40 mx-auto lg:mx-0">
                        <a href="{{ route('homepage') }}">
                            <img src="../build/assets/img/ingkenefutsal/ingkenefutsal-full.png">
                        </a>
                    </div>
                    <div class="px-8 pt-6 pb-0 mb-0 text-center lg:text-left bg-white border-b-0 rounded-t-2xl">
                        <h5 class="text-2xl font-bold">Daftar sebagai Partner</h5>
                    </div>
                    @if (Session::has('error'))
                        <div class="flex items-center bg-transparent text-red-700 text-sm font-bold px-8 mt-3"
                            role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p>{{ session::get('error') }}</p>
                        </div>
                    @endif
                    <div class="flex-auto py-4 px-8">
                        <form role="form text-left" action="{{ route('partner.register.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-xs font-bold mb-1">Name:</label>
                                <input type="text" name="name"       
                                    class="placeholder:text-gray-500 text-xs leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 focus:border-teal-600 focus:bg-white focus:text-gray-700"
                                    placeholder="Name" aria-label="Name" aria-describedby="email-addon" />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-xs font-bold mb-1">Email:</label>
                                <input type="email" name="email"
                                    class="placeholder:text-gray-500 text-xs leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 focus:border-teal-600 focus:bg-white focus:text-gray-700"
                                    placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                            </div>
                            <div class="flex flex-row gap-4">
                                <div class="mb-4">
                                    <label for="password"
                                        class="block text-gray-700 text-xs font-bold mb-1">Password:</label>
                                    <input type="password" name="password"
                                        class="placeholder:text-gray-500 text-xs leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 focus:border-teal-600 focus:bg-white focus:text-gray-700"
                                        placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                                </div>
                                <div class="mb-4">
                                    <label for="Re-type Password" class="block text-gray-700 text-xs font-bold mb-1">Re-type
                                        Password:</label>
                                    <input type="password" name="password_confirmation"
                                        class="placeholder:text-gray-500 text-xs leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 focus:border-teal-600 focus:bg-white focus:text-gray-700"
                                        placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                                </div>
                                <label for="remember" class="ms-2 text-xs font-medium text-gray-900 ">Saya menyetujui <a href="#" class="text-blue-600 hover:underline ">syarat dan ketentuan</a>.</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="inline-block w-full px-5 py-2.5 mb-2 font-bold text-center text-white align-middle border-0 rounded-lg leading-normal text-xs shadow-md bg-teal-600 hover:border-teal-700 hover:bg-teal-700 hover:text-white">Daftar</button>
                            </div>
                            <p class="mt-4 mb-0 leading-normal text-xs">Sudah punya akun?
                                <a href="{{ route('partner.login_from') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">
                                    Masuk
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="fixed bottom-8 ml-16">
                    <div class="container">
                        <p class="mb-0 text-slate-400 text-xs">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Ingkenefutsal Web Magelang
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-1/2 hidden lg:inline-block">
                <img id="changingImage" src="../build/assets/img/futsal-potrait-1.jpg" class="h-full w-full object-cover">
            </div>
        </section>
    </main>

@endsection
