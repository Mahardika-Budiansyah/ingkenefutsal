@extends('user.layouts.mainlayouts')

@section('title', 'Dashboard')
@section('content')

@include('user.partials.jumbotronDashboard')

    <div class="pt-32 md:px-32 px-6">
        <div class="bg-white px-8 py-4 shadow-md rounded-lg my-6">
            <h1 class="text-xl font-semibold">Pesanan</h1>
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2">
                        <a href="#"
                            class="inline-block p-4 text-teal-600 border-b-2 border-teal-600 rounded-t-lg active"
                            aria-current="page">Semua</a>
                    </li>
                    <li class="me-2">
                        <a href="#" class="inline-block p-4 border-b-2 rounded-t-lg" aria-current="page">Menunggu
                            Pembayaran</a>
                    </li>
                    <li class="me-2">
                        <a href="#" class="inline-block p-4 border-b-2 rounded-t-lg" aria-current="page">Berhasil</a>
                    </li>
                    <li class="me-2">
                        <a href="#" class="inline-block p-4 border-b-2 rounded-t-lg" aria-current="page">Selesai</a>
                    </li>
                </ul>
            </div>

            
        </div>
    </div>

@endsection
