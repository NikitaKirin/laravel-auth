<x-layout.auth>
    <x-slot:title>Восстановление пароля</x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('password.store') }}" method="POST" novalidate="true">
                <x-form.item>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.text id="email" name="email" type="email" autocomplete="email" required
                                 placeholder="examlpe@mail.com"/>
                </x-form.item>
                <x-form.item>
                    <x-button type="submit">Продолжить</x-button>
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
