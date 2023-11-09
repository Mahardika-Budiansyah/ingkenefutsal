@extends('partner.layouts.mainlayouts')

@section('title', 'Lapangan')
@section('content')
    
  <!-- Modal Start -->
  <div id="field_create" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
      <!-- Modal header -->
      <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Add Field
          </h3>
      </div>
      <!-- Modal body -->
      <form action="{{ route('store_field.store') }}" method="POST">
        @csrf
          <div class="flex flex-warp gap-4 mb-4 sm:grid-cols-2">
            <div class="flex flex-col">
              <div>
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
              </div>
              <div>
                <label for="fieldtypes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Field Type:</label>
                <select name="fieldtypes" id="fieldtypes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option selected>Select One</option>
                  @foreach ($fieldtypes as $data)
                      <option value="{{ $data->id }}">{{ $data->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                  <textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write field description here"></textarea>                    
              </div>
              <div>      
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
                <input name="image" id="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
              </div>
            </div>
            <div>
              <label for="timetable" class="block text-sm font-medium text-gray-900 dark:text-white">Timetable</label>
              <div class="grid gap-4 mb-4 sm:grid-cols-4">
                @foreach ($timetables as $data)
                <div class="">
                  <input {{ $data->value ? 'checked' : null }} data-id="{{ $data->id }}" type="checkbox" class="timetable-enable w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="timetables" class="ml-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ $data->name }} 
                  </label>
                
                  <input value="{{ $data->price ?? null }}" {{ $data->price ? null : 'disabled' }} data-id="{{ $data->id }}" name="timetables[{{ $data->id }}]" type="text" class="mt-2 pl-4 text-right timetable-price bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" id="tanpa-rupiah">
                </div>
                @endforeach
                @if($errors->has('timetables'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timetables') }}
                    </div>
                @endif
              </div>
            </div>     
          </div>
          <!-- Modal footer -->
          <div class="flex justify-end items-center pt-4 p-0 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="field_create" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Create
            </button>
            <button data-modal-hide="field_create" data-bs-dismiss="create_field" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
              Close
            </button>
        </div>
        </form>
      </div>
  </div>
  <!-- Modal End -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap justify-between">
          <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="dark:text-white">All Fields</h6>
          </div>
          <div class="p-4 pb-0 mb-0 d-flex align-items-center">
            <button type="button" data-modal-target="field_create" data-modal-toggle="field_create" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
              +&nbsp; New Field
            </button>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    #
                  </th>
                  <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Lapangan
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Tipe Lapangan
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Deskripsi
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Updated Date
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fields as $data)
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-center text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                      {{ $loop->iteration }}
                    </p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                      {{ $data->name }}
                    </p>
                  </td>
                  <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-center text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                      {{ $data->fieldtypes->name }}
                    </p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                      {{ $data->description }}
                    </p>
                  </td>
                  <td class="p-2 align-middle text-center bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                      {{ $data->updated_at }}
                    </span>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                    <button type="button" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-600">
                      <a href="{{ route('detail_field.show', $data->slug) }}" class="" data-bs-toggle="tooltip" data-bs-original-title="detail">
                        <i class="fas fa-regular fa-image fa-lg text-white pe-1"></i> Info
                      </a>
                    </button>
                    <button type="button" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-600">
                      <a href="{{ route('edit_field.edit', $data->slug) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="edit">
                        <i class="fas fa-user-edit text-white pe-1"></i> Edit
                      </a>
                    </button>
                    <button hidden>
                        <form action="{{ route('field_destroy.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="button" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-600">
                            <a href="" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="edit">
                              <i class="fas fa-trash text-white pe-1"></i> Delete
                            </a>
                          </button>
                        </form>
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

  <footer class="pt-4">
    <div class="w-full px-6 mx-auto">
      <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
          <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
            ©
            <script>
              document.write(new Date().getFullYear() + ",");
            </script>
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-semibold dark:text-white text-slate-700" target="_blank">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
          <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
      
    
    
@endsection
