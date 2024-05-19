<x-layout.auth>
    <x-slot:title>Восстановление пароля</x-slot:title>

    <x-card>
        <x-card.body>
            Перейдите по ссылке, отправленной на ваш email.
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        <x-link href="{{ route('login') }}">
            Войти в аккаунт
        </x-link>
    </x-slot:crosslink>
</x-layout.auth>
