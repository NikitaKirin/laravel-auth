<x-layout.auth>
    <x-slot:title>Восстановление пароля</x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('password.update', ['password' => $password]) }}" method="post">
                <x-form.text type="password" name="password" placeholder="Введите новый пароль" autofocus />
                <x-form.item>
                    <x-button type="submit">Обновить пароль</x-button>
                </x-form.item>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        <x-link href="{{ route('login') }}">
            Войти в аккаунт
        </x-link>
    </x-slot:crosslink>
</x-layout.auth>
