@extends('layouts.admin')

@section('content')
<x-header name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Candidate') }}: <span class="text-blue-900 underline">{{ $candidate->name }}</span>
    </h2>
</x-header>
<x-second-navbar :candidate="$candidate" />
<div class="py-12 p-4">
    <x-message />
    <div class="bg-white max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 rounded">

        <div class="md:flex md:space-x-4">
            <div class="flex-1">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Full name') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->name }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Address') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->address }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Date of birth') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->birth_date->format('m.d.Y') }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Phone') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->phone ?: '----' }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('College') }}
                    </label>
                    <label class="w-full py-2 text-gray-700">
                        {{ $candidate->college ?: '----' }}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Note') }}
                    </label>
                    <p class="w-full py-2 text-gray-700">
                        {{ $candidate->Note ?: '----' }}
                    </p>
                </div>
             </div>
            <div class="flex-1 mb-4 md:mb-0">
                <h5 class="text-gray-700 text-sm font-bold">{{ __('Technologies') }}</h5>
                <ul>
                    @foreach ($candidate->technologies as $technology)
                        <li>
                            {{ $technology->title }}
                        </li>
                    @endforeach
                </ul>
               <div class="mt-4">
                    <h5 class="text-gray-700 text-sm font-bold border-b py-1 mb-2">{{ __('Tags') }}</h5>
                    <Tags :candidatetags="{{ $candidate->tags }}" :candidate_id="{{ $candidate->id }}"></Tags>
                </div>
            </div>
        </div>
            <h5 class="text-xl italic border-t border-b py-2 mb-2">{{ __('Experience') }}</h5>
        <div>
            <ul>
                <Projects :allprojects="{{ $candidate->projects }}" :candidate="{{ $candidate }}"></Projects>
            </ul>
        </div>
    </div>
</div>
@endsection