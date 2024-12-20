<x-layout.user>

    <x-user.email-confirmation-alert/>

    <div class="px-4 sm:px-6 lg:px-8 mt-3">
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Настройки
                </h2>
            </div>
        </div>
        {{ $slot }}
    </div>

</x-layout.user>
