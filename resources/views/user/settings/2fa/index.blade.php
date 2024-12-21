<x-layout.settings>
    <div class="px-4 sm:px-0">
        <x-title>
            Настроить двухфакторную аутентификацию
        </x-title>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <x-form action="{{ $confirmationEnabled ? route('user.settings.two-fa.disable') : route('user.settings.two-fa.enable') }}" method="post">
            @unless($confirmationEnabled)
                <x-list>
                    <x-list.item>
                        <x-slot:name>Отсканируйте QR-код</x-slot:name>
                        <x-slot:value>
                            {!! $qrCode !!}
                        </x-slot:value>
                    </x-list.item>
                </x-list>
            @endif
            <x-list>
                <x-list.item>
                    <x-slot:name>Введите код подтверждения</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text type="number" name="code" placeholder="123456"/>
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
            <x-form.footer>
                <x-slot:buttons>
                    <x-button href="{{ back()->getTargetUrl() }}" color="white">
                        Отменить
                    </x-button>
                    <x-button type="submit">
                        {{ $confirmationEnabled ? 'Выключить' : 'Включить' }}
                    </x-button>
                </x-slot:buttons>
            </x-form.footer>
        </x-form>
    </div>
</x-layout.settings>
