@props(['href' => '#'])

<a href="{{ $href }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
    {{ $slot }}
</a>
