@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

@include('user.partials.jumbotronDashboard')

    <div class="mx-auto max-w-screen-lg px-6 py-12">
        <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-left text-gray-500 bg-transparent rounded-lg sm:text-base sm:p-4 sm:space-x-4">
            <li class="flex items-center text-teal-700">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-teal-700 rounded-full shrink-0">
                    1
                </span>
                Review Order
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center text-gray-400">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-400 rounded-full shrink-0">
                    2
                </span>
                Metode Pembayaran
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center text-gray-400">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-400 rounded-full shrink-0">
                    3
                </span>
                Order Selesai
            </li>
        </ol>
        
        @if(isset($cartItems) && is_array($cartItems) && count($cartItems) > 0)
            @php
            $firstItem = reset($cartItems); // Mengambil elemen pertama dari array
            @endphp
        <div class="flex flex-col sm:flex-row gap-4 text-center sm:text-left">
            <div class="px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg basis-8/12 sm:basis-6/12 md:basis-7/12 lg:basis-8/12">
                <div class="py-2 border-b border-gray-300 flex justify-between">
                    <h1 class="text-xl font-bold">{{ $firstItem['fieldName'] }}</h1>
                    <span class="text-xs font-normal mt-2 px-2 py-[4px] bg-teal-600 text-white rounded-md">{{ $firstItem['fieldtypes'] }}</span>
                </div>
                <div class="py-2">
                    <p class="text-base font-semibold text-left">{{ $firstItem['selectedDate'] }}</p>
                </div>
                @foreach($cartItems as $item)
                <div class="py-2 px-2 my-2 flex justify-between border-l-4 border-teal-600 bg-teal-100 text-base font-normal">
                    <input type="text" value="{{ $firstItem['fieldName'] }}" >          
                    <input type="text" value="{{ $firstItem['selectedDate'] }}">
                    <input type="text" value="{{ $firstItem['selectedDate'] }}">
                    <div >
                        @if(isset($item['name']))
                        <input type="text" value="{{ $item['name'] }}">
                        @endif
                    </div>
                    
                    <div>
                        @if(isset($item['pivot']['price']))
                        <input type="text" value="{{ $item['pivot']['price'] }}">
                        Rp. {{ number_format($item['pivot']['price'], 0, ',', '.') }}
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <p>Your cart is empty.</p>
                @endif
            </div>
            <div class="flex-grow px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg">
                <div class="flex-row">
                    <div class="py-2 border-b border-gray-300">
                        <h1 class="text-lg font-bold">
                            Rincian Biaya:
                        </h1>
                    </div>
                    <div class="py-2">
                        <div class="flex justify-between">
                            <div>
                                Biaya Sewa:
                            </div>
                            <div>
                                Rp.100.000
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                Biaya Sewa:
                            </div>
                            <div>
                                Rp.90.000
                            </div>
                        </div>
                    </div>
                    <div class="py-2 border-t border-gray-300">
                        <div class="flex justify-between">
                            <div class="font-bold">
                                Total Biaya:
                            </div>
                            <div>
                                Rp.190.000
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-teal-600 hover:bg-teal-700 my-2 px-auto py-2 text-white font-medium align-center text-center rounded-lg">
                    <button >
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>    
        </div>
        <div class="container">
            <h1>Review Order</h1>
            @if(isset($cartItems) && is_array($cartItems) && count($cartItems) > 0)
            <ul>
                @foreach($cartItems as $item)
                    <li>
                        @if(isset($item['fieldName']))
                            <strong>Field Name:</strong> {{ $item['fieldName'] }}<br>
                        @endif
                        @if(isset($item['selectedDate']))
                            <strong>Tanggal:</strong> {{ $item['selectedDate'] }}<br>
                        @endif
                        @if(isset($item['name']))
                            <strong>Jam:</strong> {{ $item['name'] }}<br>
                        @endif
                        @if(isset($item->pivot['price']))
                            <strong>Price:</strong> {{ $item->pivot['price'] }}<br>
                        @endif
                        <!-- Tampilkan detail item sesuai kebutuhan -->
                    </li>
                @endforeach
            </ul>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection

@isset($cartItems)
    <script>
        console.log('Received cartItems:', @json($cartItems));
    </script>

    
@endisset