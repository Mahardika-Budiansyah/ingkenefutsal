@extends('user.layouts.mainlayouts')

@section('title', 'Field')
@section('content')

    @include('user.partials.jumbutronUser')

    <div class="max-w-screen-xl mx-auto px-6 py-12">
        <h1 class="font-semibold lg:text-4xl md:text-4xl sm:text-3xl mb-3">Semua Lapangan</h1>
        <div class="w-full mb-6">
            <form>
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">fieldtypes_id</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-teal-100 border border-teal-300 rounded-s-lg hover:bg-teal-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                        type="button">Semua Tipe Lapangan <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-teal-100 rounded-lg shadow w-48">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            @foreach ($fieldtypes as $data)
                            <li>
                                <button type="button" value="{{ $data->id }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">{{ $data->name }}</button>
                            </li>
                            </li>
                            @endforeach
                        </ul>
                    </div>  
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-teal-500"
                            placeholder="Search Mockups, Logos, Design Templates..." required>
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-teal-700 rounded-e-lg border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($fields as $item)
                <div class="flex max-w-xl flex-col justify-between">
                    <div class="relative flex-shrink-0 h-48 w-full">
                        <img class="absolute object-cover h-full w-full rounded-t-md"
                            src="/build/assets/img/lapangan.jpg" />
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 group-hover:text-deep-teal text-gray-800">
                        {{ $item->name }}
                    </h3>
                    <p>Jalan tanjung depok, sleman</p>
                    <div class="flex justify-between gap-2 mt-3">
                        <span class="text-md font-bold">Mulai dari : <br> Rp. 30000</span>
                        <span
                            class="text-xs bg-teal-100 px-2 py-1 max-h-[22px] text-slate-900 rounded-lg flex items-center justify-center">{{ $item->fieldtypes->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
