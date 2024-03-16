<x-layout.auth>
    <x-slot:title>Войти</x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('login.store') }}" method="POST" novalidate="true">
                <x-form.item>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.text id="email" name="email" type="email" autocomplete="email" required
                                 placeholder="examlpe@mail.com"/>
                </x-form.item>
                <x-form.item>
                    <x-form.label for="password">Пароль</x-form.label>
                    <x-form.text id="password" name="password" type="password" required
                                 placeholder="********"/>
                </x-form.item>
                <x-form.item>
                    <x-form.check name="agreement">
                        Запомнить меня
                    </x-form.check>
                </x-form.item>
                <x-form.item>
                    <x-button type="submit">Войти</x-button>
                </x-form.item>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Еще нет аккаунта?

        <x-link href="{{ route('registration') }}">
            Зарегистрироваться
        </x-link>
    </x-slot:crosslink>
</x-layout.auth>
