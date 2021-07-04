@extends('layouts.admin')

@section('content')
<x-header>
    {{ __('Create candidate') }}
</x-header>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="w-full max-w-sm md:max-w-5xl mx-auto">
                <form action="{{ route('candidates.store') }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="block md:flex md:space-x-4">
                        <div class="flex-1">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">
                                    {{ __('Full name') }}*
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="fullname" name="name" type="text" placeholder="Full name" value="{{ old('name') }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    {{ __('Address') }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="address" name="address" type="text" placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">
                                    {{ __('Date of birth') }}*
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="birth_date" name="birth_date" type="date" placeholder="Date of birth"  value="{{ old('birth_date') }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                    {{ __('Phone') }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="phone" name="phone" type="text" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="college">
                                    {{ __('College') }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="college" name="college" type="text" placeholder="College" value="{{ old('college') }}">
                            </div>
                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                                    {{ __('Note') }}
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                                    rows="4" id="note" name="note" placeholder="Note">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <x-assign-technology :allTechnologies="$allTechnologies" />
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            type="submit">
                            {{ __('Next') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection