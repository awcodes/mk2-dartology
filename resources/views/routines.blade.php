<x-base-layout>
    <x-slot name="title">Practice Routines</x-slot>
    <x-slot name="description">Dartology has a plethora of practice routines to help you achieve your darting goals, even if your goal is as simple as beating your friends in your local pub on a Tuesday night.</x-slot>

    @section('hero')
        <x-hero heading="Practice Routines">
            <p>We have a plethora of practice routines to help you achieve your darting goals, even if your goal is as simple as beating your friends in your local pub on a Tuesday night.</p>
        </x-hero>
    @endsection

    @if (isset($crumbs))
        <x-breadcrumbs :crumbs="$crumbs" />
    @endif

    @if ($routines)
        <ul class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($routines as $routine)
            <li>
                <a href="{{ route('routines.show', $routine) }}" class="h-full p-5 border border-gray-800 rounded shadow-md reset-link group hover:bg-gray-800 focus:bg-gray-800 flex flex-col">
                    <h2 class="inline-block group-hover:text-secondary-500 text-xl">{{ $routine->name }}</h2>
                    <p class="leading-6 group-hover:text-secondary-300 flex-1">
                        {!! $routine->goal !!}
                    </p>
                    <p class="-mt-2 text-xs text-gray-400"><strong>Skills:</strong> {{ $routine->skills->implode('name', ', ') }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    @else
        <h2>No routines to show at the moment</h2>
        <p>Check back soon. We're working tirelessly to bring you this awesome content.</p>
    @endif
</x-base-layout>