@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

@include('user.partials.jumbotronDashboard')

    
    <div class="mx-auto max-w-screen-xl px-6 py-12">
        @include('user.partials.breadcrumbCheckout')
        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex flex-col w-auto md:w-1/4 gap-6">
                <div class="px-8 py-4 bg-white shadow rounded-lg">
                    <div class="py-2 border-b border-gray-300">
                        <h1 class="text-xl font-bold">Status Order</h1>
                    </div>
                    <div class="py-2 flex justify-start">
                        <div class="w-1/3 block text-sm font-medium text-gray-900">Status</div>
                        <span class="block text-sm font-medium text-gray-900">:</span>
                        <button type="button" class="block mx-4 px-2 py-1 bg-teal-600 hover:bg-teal-700 rounded-lg text-white text-xs font-bold">
                            <a href="#">
                                cek status</a>    
                        </button>
                    </div>
                </div>
                <div class="px-8 py-4 bg-white shadow rounded-lg">
                    <div class="py-2 border-b border-gray-300">
                        <h1 class="text-xl font-bold">Bukti Pembayaran</h1>
                    </div>
                    <div class="py-2">
                        <div class="p-20 bg-teal-600">Image</div>
                        <img src="" alt="" >
                    </div>
                    
                </div>
            </div>
            <div class="px-12 py-12 w-auto md:w-1/2 bg-white shadow rounded-lg text-left">
                <div class="py-2 text-right">
                    <div class="flex justify-end">
                        <img src="{{ url('build/assets/img/ingkenefutsal/ingkenefutsal-full.png') }}" alt="" class="w w-40">
                    </div>
                    <div>
                        <div class="py-1">
                            <div class="font-bold text-sm">Ingkenefutsal Web Magelang</div>
                            <div class="font-normal text-sm">ingkenefutsal.com</div>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-8">
                    <h1 class="text-5xl font-bold">Invoice</h1>
                </div>
                <div class="flex justify-end">
                    <div class="block text-sm font-medium text-gray-900">Date</div>
                    <span class="px-1 block text-sm font-medium text-gray-900">:</span>
                    <span class="block text-sm font-normal">Kamis, 30 November 2023</span>
                </div>
                <div class="py-2 flex justify-start">
                    <div class="w-1/3 block text-sm font-medium text-gray-900">No. Invoice</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    <span class="px-4 block text-sm font-normal">Invoice0001</span>
                </div>
                <div class="flex justify-start">
                    <div class="w-1/3 block text-sm font-medium text-gray-900">Nama</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    <span class="px-4 block text-sm font-normal">Mahardika Budiansyah</span>
                </div>
                <div class="flex justify-start">
                    <div class="w-1/3 block text-sm font-medium text-gray-900">Email</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    <span class="block px-4 text-sm font-normal">mahardikabudiansyah@gmail.com</span>
                </div>
                <div class="my-6 py-2 flex-row justify-start">
                    <div class="flex">
                        <div class="w-1/3  block text-sm font-medium text-gray-900">Rincian Pembayaran</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 px-4 block text-sm font-normal">12:00-13:00</div>
                        <span class="block text-sm font-medium text-transparent">:</span>
                        <span class="px-4 block text-sm font-normal">Rp. 100.000</span>
                    </div>
                    <div class="flex">
                        <div class="w-1/3 px-4 block text-sm font-normal">12:00-13:00</div>
                        <span class="block text-sm font-medium text-transparent">:</span>
                        <span class="px-4 block text-sm font-normal">Rp. 100.000</span>
                    </div>
                    <div class="pt-4 flex">
                        <div class="w-1/3  block text-sm font-medium text-gray-900">Total Bayar</div>
                        <span class="block text-sm font-medium text-gray-900">:</span>
                        <span class="px-4 block text-sm font-bold">Rp. 200.000</span>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div class="w-1/3 block text-sm font-medium text-gray-900">Dikirim ke</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    <span class="px-4 block text-sm font-normal">Mahardiky Budiansyah</span>
                </div>
                <div class="flex justify-start">
                    <div class="w-1/3 block text-sm font-medium text-gray-900">No.</div>
                    <span class="block text-sm font-medium text-gray-900">:</span>
                    <span class="block px-4 text-sm font-normal">089629792894</span>
                </div>
                <div class="mt-16 py-2">
                    <p class="t text-xs text-center">Jika ada pertanyaan, hubungi ingkenefutsal@gmail.com</p>
                </div>
            </div>            
        </div>
    </div>


@endsection