@extends('partner.layouts.mainlayouts', ['activePage' => $activePage])

@section('title', 'Detail Field')

@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex flex-wrap justify-between">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <p class="uppercase font-semibold dark:text-white">Data {{ $field->name }}</p>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="overflow-x-auto flex-none pb-4 sm:flex">
                        <div class="flex-auto">
                            <table class="table-fixed text-left md:table-fixed w-9/12">
                                <thead>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs w-3/12 py-1">
                                            Field ID
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs py-1">
                                            Field Name
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs py-1">
                                            Field Type
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->fieldtypes->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs py-1">
                                            Description
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->description }}
                                        </td>
                                    </tr>
    
                                </thead>
                            </table>
    
                            <table class="table-fixed text-left w-9/12">
                                <thead>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs w-3/12 py-1">
                                            Timetable
                                        </th>
                                        <th class="ps-4 uppercase text-secondary text-xxs w-2/5 py-1">Playing Hours</th>
                                        <th class="uppercase text-secondary text-xxs py-1">Price</th>
                                    </tr>
                                    @foreach ($field->timetables as $item)
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs w-3/12 py-1">
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-xs py-1">
                                            @currency($item->pivot->price)
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </thead>
                            </table> 
    
                            <table class="table-fixed text-left w-9/12">
                                <thead>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs w-3/12 py-1">
                                            Creation Date
                                        </th> 
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="uppercase text-secondary text-xxs py-1">
                                            Updated Date
                                        </th>
                                        <td class="ps-4 text-xs py-1">
                                            {{ $field->updated_at }}
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        
                        <div class="flex-auto">
                            <p class="uppercase text-secondary font-bold text-xxs mb-4">
                                Photos
                            </p>
                            <span>
                                @if ($field->image != '')
                                    <img src="{{ asset('storage/lapangan/image'.$field->image) }}" alt="" width="200px">
                                @else
                                    <img src="{{ asset('storage/lapangan/default/No-Image-Found.png') }}" alt="No Image Found" width="200px">
                                @endif
                            </span>
                        </div>      
                    </div>
                    <div class="flex justify-end items-center pt-4 p-0 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            <a href="{{ route('field.index') }}">
                                Back
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection