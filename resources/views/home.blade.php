<x-layout>
    <x-hero>
        <x-slot name="heading">
            @auth
                Welcome back, {{ auth()->user()->nick_name ?? auth()->user()->username }}!
            @else
                Welcome to Dartology!
            @endauth
        </x-slot>

        <p>
            Dartology is a collection of tools to learn more about the game of darts and become more proficient in your
            skill. From novice to league player and drunken monkey to professional, we've got you covered.
        </p>
    </x-hero>

    <section class="mt-12">
        <x-container>
            <h2>Practice Make Perfect</h2>

            <p class="text-sm italic">
                (well, maybe not perfect, but way better)
            </p>

            <p>
                We have a plethora of practice routines to help you achieve your darting goals, even if your goal is as
                simple as beating your friends in your local pub on a Tuesday night.
            </p>

            <Link href="{{ route('routines.index') }}" class="mt-4 btn secondary md:inline-flex md:mr-4">All Practice Routines</Link>
            <Link href="{{ route('routines.random') }}" class="mt-4 btn secondary md:inline-flex md:mr-4">Random Routine</Link>
            <Link href="{{ route('skills.index') }}" class="mt-4 btn secondary md:inline-flex md:mr-4">Skills</Link>
        </x-container>
    </section>

    <section class="mt-12">
        <x-container>
            <h2>Playing the Percentages</h2>

            <p>
                We all have good and bad days in darts, but wouldn't it be nice to increase your chances of winning x01
                games on those bad days? Well it's possible if you learn to play the percentages. Using the right checkouts will
                dramatically increase that chance and make the good days even better.
            </p>

            <Link href="{{ route('flipout') }}" class="mt-4 btn secondary md:inline-flex">Play Flipout</Link>

        </x-container>
    </section>

    <section class="mt-12">
        <x-container>
            <h2>What's My Out?</h2>

            <p>
                Yea, we hear it all the time too, but we got you covered. Our Checkout Chart shows you the best way to
                go, based on playing the percentages, when trying to win a game.
            </p>

            <Link href="{{ route('checkouts') }}" class="mt-4 btn secondary md:inline-flex">Look up an Out</Link>

        </x-container>
    </section>

    <section class="mt-12">
        <x-container>
            <h2>What should I do?</h2>

            <p>
                Sometimes it's hard to know what to do to get to the best check out. Our Setups tool will help you learn
                what the best thing to do is when you're trying to get to a good out before your opponent does.
            </p>

            <Link href="{{ route('setups') }}" class="mt-4 btn secondary md:inline-flex">View Setups</Link>

        </x-container>
    </section>

    <section class="mt-12">
        <x-container>
            <h2>What the hell is an 'oche' anyway?</h2>

            <p>
                There's a lot of weird words and phrases you'll hear around the dart board. And by "a lot", we mean a
                ton (pun definitely intended). Have a look at the <a href="https://en.wikipedia.org/wiki/Glossary_of_darts">Glossary of darts on Widipedia.</a> to have your mind blown. 🤯
            </p>
        </x-container>
    </section>
</x-layout>
