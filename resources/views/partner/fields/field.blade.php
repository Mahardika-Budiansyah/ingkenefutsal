@extends('partner.layouts.mainlayouts')

@section('title', 'Lapangan')
@section('content')
    
  <!-- Modal Start -->
  <div id="field_create" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full lg:px-32 px-4 pt-[1050px] md:pt-32 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
      <!-- Modal header -->
      <div class="flex justify-between items-center rounded-t border-b sm:mb-3 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            <p class="uppercase font-bold dark:text-white">Add Field</p>
          </h3>
      </div>
      @if($errors->has('timetables'))
        <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <div class="invalid-feedback">
                <p>{{ $errors->first('timetables') }}</p>
            </div>
        </div>
      @endif
      <!-- Modal body -->
      <form method="post" action="{{ route('field.store') }}" enctype="multipart/form-data">
        @csrf
          <div class="grid-cols-2 gap-4 mb-4 sm:flex">
            <div>
              <div class="py-1">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                  <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
              </div>
              <div class="py-1">
                <label for="fieldtype_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Field Type:</label>
                <select name="fieldtype_id" id="fieldtype_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option selected>Select One</option>
                  @foreach ($fieldtypes as $data)
                      <option value="{{ $data->id }}">{{ $data->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="py-1 sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                  <textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write field description here"></textarea>                    
              </div>
              <div class="py-1">      
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
                <input name="image" id="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
              </div>
            </div>
            <div>
              <label for="timetable" class="py-1 block text-sm font-medium text-gray-900 dark:text-white">Timetable</label>
              <div class="grid gap-4 mb-4 sm:grid-cols-4">
                @foreach ($timetables as $data)
                <div class="">
                  <input {{ $data->value ? 'checked' : null }} data-id="{{ $data->id }}" type="checkbox" class="timetable-enable w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="timetables" class="ml-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ $data->name }} 
                  </label>                
                  <input value="{{ $data->price ?? null }}" {{ $data->price ? null : 'disabled' }} data-id="{{ $data->id }}" name="timetables[{{ $data->id }}]" type="text" class="mt-2 pl-4 text-right timetable-price bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:ring-primary-500 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" placeholder="0" id="tanpa-rupiah">
                </div>
                @endforeach
              </div>
            </div>     
          </div>
          <!-- Modal footer -->
          <div class="flex justify-end items-center pt-4 p-0 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        @if(Session::has('error'))
          <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session::get('error') }}</p>
          </div>
        @endif
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
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    #
                  </th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
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
                      <a href="{{ route('field.show', $data->slug) }}" class="" data-bs-toggle="tooltip" data-bs-original-title="detail">
                        <i class="fas fa-regular fa-image fa-lg text-white pe-1"></i> Info
                      </a>
                    </button>
                    <button type="button" class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-600">
                      <a href="{{ route('field.edit', $data->slug) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="edit">
                        <i class="fas fa-user-edit text-white pe-1"></i> Edit
                      </a>
                    </button>
                    <button hidden>
                        <form action="{{ route('field.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-600">
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

@endsection
