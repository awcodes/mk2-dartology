<x-base-layout>
    <x-slot name="title">All Skills</x-slot>
    <x-slot name="description">Dartology's routines are broken down by different types of skills to help you find the right routine to help you maximize your game.</x-slot>

    @section('hero')
        <x-hero heading="All Skills">
            <p>Dartology's routines are broken down by different types of skills to help you find the right routine to help you maximize your game.</p>
        </x-hero>
    @endsection

    @if (isset($crumbs))
        <x-breadcrumbs :crumbs="$crumbs" />
    @endif

    @if ($skills)
        <ul class="divide-y divide-gray-700">
            @foreach ($skills as $skill)
            <li>
                <a href="{{ route('skills.show', $skill) }}" class="flex items-center py-5 reset-link group">
                    <span class="flex-1 block">
                        <h2 class="inline-block group-hover:text-secondary-500">{{ $skill->name }}</h2>
                    </span>
                    <x-heroicon-s-chevron-right class="flex-shrink-0 w-6 h-6 ml-3 group-hover:text-secondary-500" />
                </a>
            </li>
            @endforeach
        </ul>
    @else
        <h2>No skills to show at the moment</h2>
        <p>Check back soon. We're working tirelessly to bring you this awesome content.</p>
    @endif
</x-base-layout>