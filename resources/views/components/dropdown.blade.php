@props([
    'trigger' => null
])

<div x-data="{}" class="relative">

    <button type="button" class="block" x-on:click="$refs.panel.toggle">
        {{ $trigger }}
    </button>

    <div x-ref="panel" x-float.placement.bottom-end.flip.trap class="absolute z-50 hidden mt-2">
        <div class="p-2 mt-2 space-y-1 bg-gray-800 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
            {{ $slot }}
        </div>
    </div>
</div>