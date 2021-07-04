@props([
    'key' => 'message'
])

<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
    @if (session($key))
        <div {{ $attributes->merge([
                'class' => 'mb-2 px-4 py-2 rounded bg-green-300 text-green-700 font-semibold'
            ]) }}>
            {{ session($key) }}
        </div>
    @endif
</div>