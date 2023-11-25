@extends('layouts.auth.mainlayouts')

@section('title', 'Sign Up Partner')
@section('content')

    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section class="min-h-screen">
            <div
                class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg')]">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
                <div class="container z-10">
                    <div class="flex flex-wrap justify-center -mx-3">
                        <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                            <h1 class="mt-12 mb-2 text-white text-5xl font-extrabold">Welcome!</h1>
                            <p class="text-white font-medium">Use these awesome forms to login or create new account in your
                                project for free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                        <div
                            class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                            <div class="px-6 pb-0 py-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                <h5 class="text-3xl font-bold">Sign Up</h5>
                                <p><i>(Registration Account Partner)</i></p>
                            </div>
                            @if (Session::has('error'))
                                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3"
                                    role="alert">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                    </svg>
                                    <p>{{ session::get('error') }}</p>
                                </div>
                            @endif
                            <div class="flex-auto p-6">
                                <form role="form text-left" action="{{ route('partner.register.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-gray-700 text-sm font-bold mb-1">Name:</label>
                                        <input type="text" name="name"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Name" aria-label="Name" aria-describedby="email-addon" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="email"
                                            class="block text-gray-700 text-sm font-bold mb-1">Email:</label>
                                        <input type="email" name="email"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="password"
                                            class="block text-gray-700 text-sm font-bold mb-1">Password:</label>
                                        <input type="password" name="password"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="Re-type Password"
                                            class="block text-gray-700 text-sm font-bold mb-1">Re-type Password:</label>
                                        <input type="password" name="password_confirmation"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" />
                                    </div>
                                    <div class="min-h-6 pl-7 mb-0.5 block">
                                        <input
                                            class="w-4.8 h-4.8 ease -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-blue-500 checked:to-violet-500 after:text-xxs after:font-awesome after:duration-250 after:ease-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                            type="checkbox" value="" checked />
                                        <label class="mb-2 ml-1 font-normal cursor-pointer text-sm text-slate-700"
                                            for="flexCheckDefault"> I agree the <a href="javascript:;"
                                                class="font-bold text-slate-700">Terms and Conditions</a> </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign
                                            up</button>
                                    </div>
                                    <p class="mt-4 mb-0 leading-normal text-sm">Already have an account? <a
                                            href="{{ route('partner.login_from') }}" class="font-bold text-slate-700">Sign
                                            in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="py-12">
            <div class="container">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                        <p class="mb-0 text-slate-400">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Ingkenefutsal Web Magelang
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </main>

@endsection
