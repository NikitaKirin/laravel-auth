<label class="form-check flex items-start">
    <input type="checkbox" {{ $attributes }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 relative top-1">

    <span class="ml-3 block text-sm leading-6 text-gray-900">
        {{ $slot }}
    </span>
</label>
