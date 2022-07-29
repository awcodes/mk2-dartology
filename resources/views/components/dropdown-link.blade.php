@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'block py-2 text-center bg-gray-700 rounded reset-link hover:bg-primary-500 hover:text-gray-900 focus:bg-primary-500 focus:text-gray-900';
@endphp

<Link {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</Link>