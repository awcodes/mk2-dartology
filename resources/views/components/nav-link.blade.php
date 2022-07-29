@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 transition duration-150 ease-in-out' : 'reset-link hover:text-primary-600 text-secondary-500';
@endphp

<Link {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</Link>
