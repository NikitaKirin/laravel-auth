<x-layout.auth>
    <x-slot:title>Подтвердите вход</x-slot:title>

    <x-card>
        <x-card.body>
            <x-form action="{{ route('login.confirm', $loginAttempt) }}" method="POST" novalidate="true">
                <x-form.item>
                    <x-form.label for="code">Введите код</x-form.label>
                    <x-form.text id="code" name="code" type="number" required
                                 placeholder="123456"/>
                </x-form.item>
                <x-form.item>
                    <x-button type="submit">Подтвердить</x-button>
                </x-form.item>
            </x-form>
        </x-card.body>
    </x-card>

    <x-slot:crosslink>
        <x-link href="{{ route('login') }}">
            Вернуться назад
        </x-link>
    </x-slot:crosslink>
</x-layout.auth>
