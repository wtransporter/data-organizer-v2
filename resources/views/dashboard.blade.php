@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-0 md:py-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden grid md:grid-cols-3 lg:grid-cols-4 md:gap-2">
            @forelse ($candidates as $candidate)
                <x-candidate :candidate="$candidate" />
            @empty
                {{ __('No candidates yet') }}
            @endforelse
        </div>
        <div class="mt-4">
            {{ $candidates->links() }}
        </div>
    </div>
</div>
@endsection