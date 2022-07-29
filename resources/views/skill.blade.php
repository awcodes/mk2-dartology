<x-base-layout>
    <x-slot name="title">{{ $skill->name }} | Skills</x-slot>
    <x-slot name="description">Routines in the "{{ $skill->name }} skills category.</x-slot>

    @section('hero')
        <x-hero heading="{{ $skill->name }}">
            <p>Routines categorizied as "{{ $skill->name }}".</p>
        </x-hero>
    @endsection

    @if (isset($crumbs))
        <x-breadcrumbs :crumbs="$crumbs" />
    @endif

    @if ($skill->routines)
        <ul class="divide-y divide-gray-700">
            @foreach ($skill->routines as $routine)
                <li>
                    <a href="{{ route('routines.show', $routine) }}" class="flex items-center py-5 reset-link group">
                        <span class="flex-1 block">
                            <h2 class="inline-block group-hover:text-secondary-500">{{ $routine->name }}</h2>
                            <p class="leading-6 group-hover:text-secondary-300">
                                {!! $routine->goal !!}
                            </p>
                        </span>
                        <x-heroicon-s-chevron-right class="flex-shrink-0 w-6 h-6 ml-3" />
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No rotinues to show at the moment</h2>
        <p>Check back soon. We're working tirelessly to bring you this awesome content.</p>
    @endif
</x-base-layout>
