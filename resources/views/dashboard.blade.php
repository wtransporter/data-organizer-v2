@extends('layouts.admin')

@section('content')
<x-header>
    {{ __('Dashboard') }}
</x-header>
<div class="p-4 md:p-0 md:py-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Candidates></Candidates>
    </div>
</div>
@endsection