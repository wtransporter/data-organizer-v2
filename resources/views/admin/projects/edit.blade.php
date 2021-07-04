@extends('layouts.admin')

@section('content')
<x-header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update experience') }}:
        <a href="{{ route('candidates.show', $candidate) }}" class="underline text-blue-900">
            {{ $candidate->name }}
        </a>
    </h2>
</x-header>

<div class="py-12">
    <x-message />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="w-full max-w-sm md:max-w-5xl mx-auto">
                <form action="{{ route('candidates.projects.update', [$candidate, $project]) }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')
                    <div class="block md:flex md:space-x-4">
                        <div class="flex-1">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    {{ __('Project name') }}*
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="title" name="title" type="text" placeholder="Project title" value="{{ $project->title }}">
                                <x-input-error for="title" class="mt-1 italic" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    {{ __('Description') }}
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                                    rows="4" id="description" name="description" placeholder="Description">{{ $project->description }}</textarea>
                                <x-input-error for="description" class="mt-1 italic" />
                            </div>
                        </div>
                    </div>
                    <x-assign-technology :allTechnologies="$allTechnologies" :model="$project" />
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            type="submit">
                            {{ __('Update') }}
                        </button>
                        <a href="{{ route('candidates.show', $candidate) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            type="submit">
                            {{ __('Finish') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection