@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'p-2 space-y-1 bg-gray-800', 'trigger' => null])

@php
switch ($align) {
case 'left':
$alignmentClasses = 'origin-top-left left-0';
break;
case 'top':
$alignmentClasses = 'origin-top';
break;
case 'right':
default:
$alignmentClasses = 'origin-top-right right-0';
break;
}

switch ($width) {
case '48':
$width = 'w-48';
break;
}
@endphp

<x-splade-toggle>
    <div class="relative">
        <button @click.prevent="toggle" type="button" class="block">
            {{ $trigger }}
        </button>

        <div v-show="toggled" @click.away="setToggle(false)" class="absolute z-50 mt-2 {{ $width }} absolute right-0 mt-2 {{ $alignmentClasses }}">
            <div class="w-48 p-2 mt-2 space-y-1 bg-gray-800 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-splade-toggle>