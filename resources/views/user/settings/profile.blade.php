<div class="px-4 sm:px-0">
    <x-title>
        Ваш профиль

        <x-slot:description>
            Посмотреть и изменить персональные данные.
        </x-slot:description>
    </x-title>
</div>
<div class="mt-6 border-t border-gray-100">
    <x-list>
        <x-list.item>
            <x-slot:name>Имя</x-slot:name>
            <x-slot:value>{{ $user->getFullName() }}</x-slot:value>
            <x-slot:action>
                <x-link href="{{ route('user.settings.profile.edit') }}">Изменить</x-link>
            </x-slot:action>
        </x-list.item>
    </x-list>
    <x-list>
        <x-list.item>
            <x-slot:name>Пол</x-slot:name>
            <x-slot:value>{{ $user->gender->name() }}</x-slot:value>
            <x-slot:action>
                <x-link href="{{ route('user.settings.profile.edit') }}">Изменить</x-link>
            </x-slot:action>
        </x-list.item>
    </x-list>
</div>
