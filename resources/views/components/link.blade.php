@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->class([
    'font-semibold leading-6 text-indigo-600 hover:text-indigo-500'
]) }}>
    {{ $slot }}
</a>
