@props(['active' => false])

<a @class([
    'text-white transition duration-150 ease-in-out block py-2 px-4 text-center whitespace-nowrap rounded cursor-pointer reset-link hover:bg-primary-500 hover:text-gray-900 focus:bg-primary-500 focus:text-gray-900',
    'bg-primary-500' => $active,
    'bg-gray-700 ' => !$active,
]) {{ $attributes }}>{{ $slot }}</a>