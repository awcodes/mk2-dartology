<x-splade-data default="{ open: false }">
        <!-- Primary Navigation Menu -->
        <nav class="flex items-center" aria-label="primary">

                <x-nav-link href="{{ route('welcome') }}" class="ml-6">Home</x-nav-link>

                <div class="ml-6">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-1 hover:text-primary-500 text-secondary-500">
                                <span>Practice</span>
                                <x-heroicon-s-chevron-down class="w-5 h-5" />
                            </div>
                        </x-slot>
                        <x-dropdown-link href="{{ route('routines.index') }}">All Routines</x-dropdown-link>
                        <x-dropdown-link href="{{ route('skills.index') }}">All Skills</x-dropdown-link>
                        <x-dropdown-link href="{{ route('routines.random') }}">Random Routine</x-dropdown-link>
                    </x-dropdown>
                </div>

                <div class="ml-5">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-1 hover:text-primary-500 text-secondary-500">
                                <span>Tools</span>
                                <x-heroicon-s-chevron-down class="w-5 h-5" />
                            </div>
                        </x-slot>
                        <x-dropdown-link href="{{ route('flipout') }}">Flipout</x-dropdown-link>
                        <x-dropdown-link href="{{ route('checkouts') }}">Checkout Chart</x-dropdown-link>
                        <x-dropdown-link href="{{ route('setups') }}">Setups</x-dropdown-link>
                        <x-dropdown-link href="{{ route('analyzer') }}">Analyzer</x-dropdown-link>
                    </x-dropdown>
                </div>

                @auth
                    <div class="ml-6">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <img class="block w-8 h-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                    alt="{{ auth()->user()->username }}">
                            </x-slot>
                            <x-dropdown-link href="{{ route('profile.show', auth()->user()) }}">Profile</x-dropdown-link>
                            <x-dropdown-link href="#">Settings</x-dropdown-link>
                            <x-dropdown-link href="#">Schedule</x-dropdown-link>
                            {{-- <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </x-dropdown-link> --}}
                        </x-dropdown>
                    </div>
                @else
                    {{-- <x-nav-link href="{{ route('login') }}" class="ml-5">Log in</x-nav-link>
                    <x-nav-link href="{{ route('register') }}" class="ml-6">Register</x-nav-link> --}}
                @endauth

            </nav>

        <!-- Responsive Navigation Menu -->
        <div v-bind:class="{'block': data.open, 'hidden': ! data.open }" class="sm:hidden">
            <div class="flex items-center space-x-4 lg:hidden">
            <x-dropdown>
                <x-slot name="trigger">
                    <div class="text-secondary-500 hover:text-secondary-600 focus:text-secondary-600">
                        <x-heroicon-s-menu class="w-8 h-8" />
                        <span class="sr-only">Menu</span>
                    </div>
                </x-slot>
                <x-dropdown-link href="{{ route('welcome') }}">Home</x-dropdown-link>
                <x-dropdown-link href="{{ route('routines.index') }}">All Routines</x-dropdown-link>
                <x-dropdown-link href="{{ route('skills.index') }}">Skills</x-dropdown-link>
                <x-dropdown-link href="{{ route('routines.random') }}">Random Routine</x-dropdown-link>
                <x-dropdown-link href="{{ route('flipout') }}">Flipout</x-dropdown-link>
                <x-dropdown-link href="{{ route('checkouts') }}">Checkout Chart</x-dropdown-link>
                <x-dropdown-link href="{{ route('setups') }}">Setups</x-dropdown-link>
                <x-dropdown-link href="{{ route('analyzer') }}">Analyzer</x-dropdown-link>
                @guest
                    {{-- <x-dropdown-link href="{{ route('login') }}">Login</x-dropdown-link>
                    <x-dropdown-link href="{{ route('register') }}">Register</x-dropdown-link> --}}
                @endguest
            </x-dropdown>
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <img class="block w-8 h-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                            alt="{{ auth()->user()->username }}">
                    </x-slot>
                    <x-dropdown-link href="{{ route('profile.show', auth()->user()) }}">Profile</x-dropdown-link>
                    <x-dropdown-link href="#">Settings</x-dropdown-link>
                    <x-dropdown-link href="#">Schedule</x-dropdown-link>
                    {{-- <x-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </x-dropdown-link> --}}
                </x-dropdown>
            @endauth
        </div>
        </div>
</x-splade-data>
