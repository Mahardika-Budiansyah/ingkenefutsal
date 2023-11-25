@extends('partner.layouts.mainlayouts', ['activePage' => $activePage ?? null])

@section('title', 'Lapangan')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                @if (Session::has('error'))
                    <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session::get('error') }}</p>
                    </div>
                @endif
                <div class="flex flex-wrap justify-between">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <p class="font-semibold uppercase dark:text-white">All Fields</p>
                    </div>
                    <div class="p-4 pb-0 mb-0 d-flex align-items-center">
                        <button type="button"
                            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                            <a href="{{ route('field.create') }}">
                                +&nbsp; New Field
                            </a>
                        </button>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        #
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Lapangan
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tipe Lapangan
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Deskripsi
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Updated Date
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fields as $data)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-center text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $data->name }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-center text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $data->fieldtypes->name }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $data->description }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 align-middle text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                {{ $data->updated_at }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <button type="button"
                                                class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-600">
                                                <a href="{{ route('field.show', $data->slug) }}" class=""
                                                    data-bs-toggle="tooltip" data-bs-original-title="detail">
                                                    <i class="fas fa-regular fa-image fa-lg text-white pe-1"></i> Info
                                                </a>
                                            </button>
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-600">
                                                <a href="{{ route('field.edit', $data->slug) }}" class="mx-1"
                                                    data-bs-toggle="tooltip" data-bs-original-title="edit">
                                                    <i class="fas fa-user-edit text-white pe-1"></i> Edit
                                                </a>
                                            </button>
                                            {{-- <button hidden>
                        <form action="{{ route('field.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-600">
                            <a href="" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="edit">
                              <i class="fas fa-trash text-white pe-1"></i> Delete
                            </a>
                          </button>
                        </form>
                    </button>   --}}
                                            <button onclick="deleteData('{{ route('field.destroy', $data->id) }}')"
                                                class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-600">
                                                <a href="">
                                                    <i class="fas fa-trash text-white pe-1"></i> Delete
                                                </a>


                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-3 d-flex">
                            {{ $fields->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
    </script>
@endpush
