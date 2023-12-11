@extends('user.layouts.mainlayouts')

@section('title', 'Field')
@section('content')

    @include('user.partials.jumbutronUser')

    <div class="max-w-screen-lg mx-auto px-6 py-12">
        <h1 class="font-semibold lg:text-4xl md:text-4xl sm:text-3xl mb-3">Semua Lapangan</h1>
        <div class="w-full mb-6">
            <form>
                <div class="flex py-4">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only ">fieldtypes_id</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-9 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-teal-600 border border-teal-600 rounded-s-lg hover:bg-teal-700"
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
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-teal-600 focus:border-teal-600 "
                            placeholder="Search Mockups, Logos, Design Templates..." required>
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-teal-700 rounded-e-lg border border-teal-700 hover:bg-teal-800">
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
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach ($fields as $item)
                <div class="flex max-w-xl flex-col justify-between">
                    <a href="{{ route('user.fieldShow', $item->slug) }}" class="bg-white shadow hover:shadow-xl rounded-lg">
                        <div class="relative flex-shrink-0 h-52 w-full">
                            <img class="absolute object-cover h-full w-full rounded-t-md"
                                src="/build/assets/img/lapangan.jpg" />
                        </div>
                        <div class="px-6 pt-2 pb-6">
                            <div class="flex justify-between gap-2 mt-3">
                                <h3 class="text-lg font-semibold leading-6 group-hover:text-deep-teal text-gray-800">
                                {{ $item->name }}
                                </h3>
                                <span class=" mt-1 text-xs bg-teal-700 px-2 pt-0.5 pb-1 max-h-[22px] text-white font-semibold rounded-md flex items-center justify-center">
                                    {{ $item->fieldtypes->name }}
                                </span>
                                
                            </div>
                            <p>Jalan tanjung depok, sleman</p>
                            <div class="flex justify-between gap-2 mt-3">
                                <span class="text-md font-bold">Mulai dari: Rp. 30000</span>
                                
                            </div>
                        </div>
                        
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
