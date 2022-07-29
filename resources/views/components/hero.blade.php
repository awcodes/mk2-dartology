@props([
    'heading' => null,
])

<div
    class="relative py-8 overflow-hidden border-b border-gray-700 hero bg-gradient-radial-at-b from-gray-900 to-black lg:py-16">
    <x-container class="text-center">
        @if ($heading)
            <h1 class="mb-4 lg:text-5xl">{!! $heading !!}</h1>
        @endif
        <div class="text-sm leading-6 md:text-base md:leading-7 lg:max-w-3xl lg:mx-auto">
            {{ $slot }}
        </div>
    </x-container>
</div>
