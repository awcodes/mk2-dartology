@props([
'crumbs' => []
])

<nav aria-label="breadcrumbs" class="flex items-center w-full pb-4 mb-8 space-x-1 border-b border-gray-800 lg:mb-12">
    <a href="{{ route('welcome') }}" class="relative flex-shrink-0 focus:z-10">Home</a>
    <x-heroicon-s-chevron-right class="w-5 h-5 text-gray-400" />
    @foreach ($crumbs as $crumb)
        @if (!$loop->last)
            <a href="{{ route($crumb['route']) }}" class="relative flex-shrink-0 focus:z-10">{{ $crumb['label'] }}</a>
            <x-heroicon-s-chevron-right class="w-5 h-5 text-gray-400" />
        @else
            <span class="flex-shrink-0 block text-gray-400">{{ $crumb['label'] }}</span>
        @endif
    @endforeach
</nav>