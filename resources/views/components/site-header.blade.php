<header id="site-header" class="py-5 border-b-4 border-primary-500">
    <a href="#site-main" class="flex !px-4 py-3 text-gray-900 bg-gray-400 rounded-full sr-only focus:not-sr-only focus:fixed top-3 left-3 reset-link">Skip to main content</a>
    <x-container class="flex items-center justify-between">
        <div>
            <a href="/" class="flex items-center text-2xl font-bold tracking-tight uppercase reset-link md:text-3xl text-primary-500">
                <img src="{{ asset('images/icon.svg') }}" width="132" height="100" class="w-auto h-6 fill-current md:h-8" alt="Dartology icon" />
                <span class="ml-3">Dartology</span>
            </a>
        </div>
        <div>
            {{ $slot }}
        </div>
    </x-container>
</header>