@extends('user.layouts.mainlayouts')

@section('title', 'Detail Lapangan')
@section('content')

@include('user.partials.jumbotronDashboard')

    <div class="mx-auto max-w-screen-lg px-6 py-12">
        @include('user.partials.breadcrumbCheckout')
        <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="flex flex-col sm:flex-row gap-4 text-left">
                <div class="px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg basis-9/12">
                    <div class="py-2 border-b border-gray-300">
                        <h1 class="text-xl font-bold">Data Penyewa</h1>
                    </div>
                    <div class="py-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama:</label>
                        <input type="name" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <div class="py-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
                        <input type="email" name="email" id="email" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="py-2 flex-row w-full sm:w-auto">
                        <div class="py-2 border-b border-gray-300">
                            <h1 class="text-xl font-bold">Rincian Biaya</h1>
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
                </div>

                <div class="flex-row">
                    <div class="flex-row px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg">
                        <div class="py-2 border-b border-gray-300">
                            <h1 class="text-xl font-bold">Checkout</h1>
                        </div>
                        <div class="py-2 max-w-lg mx-auto">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Bukti Pembayaran:</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar" type="file" onchange="enableButton()">
                        </div>
                    </div>
                    <div class="flex-row my-4 px-8 py-4 w-full sm:w-auto bg-white shadow rounded-lg">
                        <div class="py-2 flex text-xs">
                            <input type="checkbox" id="termsCheckbox" class="tac rounded-sm mt-0.5" onchange="enableButton()">
                            <div class="pl-2">
                                Dengan mengklik tombol berikut, Anda menyetujui
                                <a href="" class="text-teal-600 font-bold">Syarat dan Ketentuan</a>
                                serta
                                <a href="" class="text-teal-600 font-bold">Kebijakan privasi.</a>
                            </div>
                        </div>
                        <button id="submitButton" class="w-full my-2 px-auto py-2 text-white font-medium align-center text-center rounded-lg" disabled style="background-color: rgb(156 163 175)">
                            Lakukan Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

<script>
    function enableButton() {
        var checkbox = document.getElementById('termsCheckbox');
        var button = document.getElementById('submitButton');
        var fileInput = document.getElementById('user_avatar');

        // Set button disabled state based on checkbox and file input
        button.disabled = !checkbox.checked || !fileInput.files.length > 0;
        
        // Update button background color
        button.style.backgroundColor = button.disabled ? 'rgb(156 163 175)' : 'rgb(15 118 110)';
        
        // Add hover class when button is enabled
        if (button.disabled) {
            button.classList.remove('hover:bg-teal-700');
        } else {
            button.classList.add('hover:bg-teal-700');
        }
    }
</script>