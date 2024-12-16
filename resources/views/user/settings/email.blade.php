<div class="profile">

    <x-title>
        Ваш email

        <x-slot:description>
            Посмотреть и изменить email.
        </x-slot:description>
    </x-title>

    <div class="mt-6 border-t border-gray-100">
        <x-list>
            <x-list.item>
                <x-slot:name>Email</x-slot:name>
                <x-slot:value>{{ $user->email }}</x-slot:value>
                <x-slot:action>
                    <x-link href="{{ route('user.settings.email.edit') }}" wire:navigate>Изменить</x-link>
                </x-slot:action>
            </x-list.item>
        </x-list>
    </div>

</div>
