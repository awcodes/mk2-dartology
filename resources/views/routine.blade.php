<x-base-layout :title="$routine->name" :description="strip_tags($routine->goal)">

    @section('hero')
    <x-hero heading="{{ $routine->name }}">
        {!! Str::markdown($routine->goal) !!}
        <p class="text-xs lg:text-sm"><strong>Skills:</strong> {{ $routine->skills->implode('name', ', ') }}</p>
    </x-hero>
    @endsection

    @if (isset($crumbs))
    <x-breadcrumbs :crumbs="$crumbs" />
    @endif

    <div class="grid grid-cols-2 gap-8">
        <div class="col-span-2 lg:col-span-1">
            <h2 class="mt-6">Targets</h2>
            {!! Str::markdown($routine->targets) !!}

            <h2 class="mt-6">Instructions</h2>
            {!! Str::markdown($routine->instructions) !!}
        </div>
        <div class="col-span-2 lg:col-span-1">
            <div class="p-4 bg-gray-800 rounded">
                @auth
                    @if (auth()->user()->hasVerifiedEmail())
                        @if (view()->exists("livewire.routines.{$routine->slug}"))
                            <livewire:is component="routines.{{ $routine->slug }}" :routine="$routine" />
                        @else
                            <p class="text-center">Tracking coming soon</p>
                        @endif
                    @else
                        <p class="text-center">
                            Your email hasn't been verified yet. Please <a href="{{ route('verification.notice') }}">verify your email</a> to track and view your
                            results.
                        </p>
                    @endif
                @else
                <p class="text-center">
                    {{-- <a href="{{ route('login') }}">Log in</a> to track and view your results. --}}
                </p>
                @endauth
            </div>
        </div>
    </div>
</x-base-layout>