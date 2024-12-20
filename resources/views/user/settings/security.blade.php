<div class="security">
    <x-title>
        Ваш пароль

        <x-slot:description>
            Посмотреть и изменить персональные данные.
        </x-slot:description>
    </x-title>

    <div class="mt-6 border-t border-gray-100">
        <x-list>
            <x-list.item>
                <x-slot:name>Пароль</x-slot:name>
                <x-slot:value>
                    @if ($user->password_at !== null)
                        Пароль был обновлен {{ $user->password_at->diffForHumans() }}
                    @else
                        Пароль не изменялся
                    @endif
                </x-slot:value>
                <x-slot:action>
                    <x-link href="{{ route('user.settings.password.edit') }}">Изменить</x-link>
                </x-slot:action>
            </x-list.item>
        </x-list>
    </div>

    <x-title>
        Двухфакторная аутентификация

        <x-slot:description>
            Настроить или выключить.
        </x-slot:description>
    </x-title>

    <div class="mt-6 border-t border-gray-100">
        <x-list>
            <x-list.item>
                <x-slot:name>Двухфакторная аутентификация</x-slot:name>
                <x-slot:value>
                    {{ \Illuminate\Support\Facades\Auth::user()->isGoogleConfirmationEnabled() ? 'Включена' : 'Выключена' }}
                </x-slot:value>
                <x-slot:action>
                    <x-link href="{{ route('user.settings.two-fa.index') }}">{{Auth::user()->isGoogleConfirmationEnabled() ? 'Выключить' : 'Включить' }}</x-link>
                </x-slot:action>
            </x-list.item>
        </x-list>
    </div>

</div>
