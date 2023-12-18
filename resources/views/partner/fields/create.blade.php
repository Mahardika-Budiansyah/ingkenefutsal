@extends('partner.layouts.mainlayouts')

@section('title', 'Edit Field')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="flex flex-wrap justify-between">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <p class="uppercase font-semibold">Add Field</p>
                    </div>
                </div>
                @if($errors->has('timetables'))
                    <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 mt-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <div class="invalid-feedback">
                            <p>{{ $errors->first('timetables') }}</p>
                        </div>
                    </div>
                @endif
                <div class="px-6 py-4">
                    <div class="overflow-x-auto">
                        <form  method="POST" action="{{ route('field.store') }}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="grid-cols-2 gap-4 mb-4 mx-1 sm:flex">
                                <div>
                                    <div class="py-1">
                                        <input name="partner_id" type="hidden" value="{{ Auth::guard('partner')->user()->id }}">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                                        <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                    </div>
                                    <div class="py-1">
                                        <label for="fieldtype_id" class="block mb-2 text-sm font-medium text-gray-900">Field Type:</label>
                                        <select name="fieldtype_id" id="fieldtype_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                            <option selected>Select One</option>
                                            @foreach ($fieldtypes as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="py-1 sm:col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                        <textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"></textarea>                    
                                    </div>
                                    <div class="py-1">      
                                        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Image</label>
                                        <input name="image" id="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white">
                                    </div>
                                </div>
                                <div class="py-1">
                                    <label for="timetable" class="block text-sm font-medium text-gray-900">Timetable</label>
                                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                                        @foreach ($timetables as $data)
                                        <div class="">
                                            <input {{ $data->value ? 'checked' : null }} data-id="{{ $data->id }}" type="checkbox" class="timetable-enable w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="timetables" class="ml-2 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ $data->name }} 
                                            </label>
                                        
                                            <input value="{{ $data->value ?? null }}" {{ $data->value ? null : 'disabled' }} data-id="{{ $data->id }}" name="timetables[{{ $data->id }}]" type="text" class="mt-2 pl-4 text-right timetable-price block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:ring-primary-500 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" placeholder="0" id="tanpa-rupiah">
                                        </div>
                                        @endforeach                                   
                                    </div>
                                </div>     
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-end items-center pt-4 p-0 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Create
                                </button>
                                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                    <a href="{{ route('field.index') }}">
                                        Back
                                    </a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection