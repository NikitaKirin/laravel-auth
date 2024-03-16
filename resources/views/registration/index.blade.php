<x-layout>
    <div class="flex min-h-screen bg-gray-50 flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Регистрация</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
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

        </div>
    </div>
</x-layout>
