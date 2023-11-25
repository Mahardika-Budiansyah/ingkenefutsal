@extends('layouts.mainlayouts')

@section('title', 'Field')
@section('content')

    <div class="pt-32 md:px-32 px-4 py-6">
        <h1 class="font-semibold lg:text-4xl md:text-4xl sm:text-3xl mb-3">Semua Lapangan</h1>
        <div class="w-1/2 mb-6">
            <input type="text" id="default-input"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Cari lapangan...">
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
