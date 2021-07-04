<div class=" max-w-4xl mx-auto p-2 sm:p-4 lg:p-4 rounded flex justify-end">
    <x-nav-link href="{{ route('candidates.edit', $candidate) }}" :active="request()->routeIs('candidates.edit')">
        {{ __('Edit') }}
    </x-nav-link>
    <x-nav-link href="{{ route('candidates.projects.create', $candidate) }}" :active="request()->routeIs('candidates.projects.create')">
        {{ __('Add experience') }}
    </x-nav-link>
</div>