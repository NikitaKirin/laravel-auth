<x-layout.auth>
    <x-slot:title>Зарегистрироваться</x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('registration.store') }}" method="POST" novalidate="true">
                <x-form.item>
                    <x-form.label for="name">Ваше имя</x-form.label>
                    <x-form.text id="name" name="first_name" type="text" required placeholder="Имя" autofocus/>
                </x-form.item>
                <x-form.item>
                    <x-form.label for="email">Ваш email</x-form.label>
                    <x-form.text id="email" name="email" type="email" autocomplete="email" required
                                 placeholder="examlpe@mail.com"/>
                </x-form.item>
                <x-form.item>
                    <x-form.label for="password">Пароль</x-form.label>
                    <x-form.text id="password" name="password" type="password" required
                                 placeholder="********"/>
                </x-form.item>
                <x-form.item>
                    <x-form.label for="password_confirmation">Повторите пароль</x-form.label>
                    <x-form.text id="password_confirmation" name="password_confirmation"
                                 type="password" required placeholder="********"/>
                </x-form.item>
                <x-form.item>
                    <x-form.check name="agreement">
                        Пользовательское соглашение
                    </x-form.check>
                </x-form.item>
                <x-form.item>
                    <x-button type="submit">Зарегистрироваться</x-button>
                </x-form.item>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        Уже зарегистрированы?

        <x-link href="{{ route('login') }}">
            Войти
        </x-link>
    </x-slot:crosslink>

</x-layout.auth>
