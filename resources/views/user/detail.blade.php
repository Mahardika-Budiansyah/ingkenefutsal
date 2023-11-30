@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

@include('user.partials.jumbotronDashboard')

    <div class="max-w-screen-xl mx-auto px-6 py-12">
        <div class="flex gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
            </div>
            <div class="grid flex-row-1 gap-4">
                <div>
                    <img class="h-auto w-auto rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto w-auto rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 py-12 text-center sm:text-left">
            <div class="mb-4 sm:mb-0 basis-9/12">
                <div class="py-2">
                    <h1 class="text-3xl font-bold">Telaga Futsal</h1>
                </div>
                <div class="py-2">
                    <span class="text-xs font-normal px-2 py-[4px] bg-teal-600 text-white rounded-md">Lapangan Sintetis</span>
                </div>
                <div class="py-2 border-b-2 border-gray-300">
                    <p class="text-base font-normal">Jl. Anggaya Nomor 2, CondongCatur, Sleman</p>
                </div>
                <div class="py-2">
                    <p class="text-base font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus saepe facere ullam error dolorem, molestiae esse reiciendis eveniet ea qui sint beatae at iure maiores necessitatibus? Aspernatur saepe quam impedit.</p>
                </div>
            </div>
            <div class="flex-grow">
                <div class="px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg">
                    <span class="text-xs">
                        Mulai dari
                    </span>
                    <div>
                        <span class="font-bold text-2xl">Rp. 40.000</span>
                        <span class="text-xs">per jam</span>
                    </div>
                    <div class="bg-teal-600 my-2 px-auto py-2 text-white align-center text-center rounded-lg">
                        Cek Ketersediaan
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
