@props(['name'])

@error($name)
<div class="text-red-600 text-xs mt-2">
    {{ $message }}
</div>
@enderror
