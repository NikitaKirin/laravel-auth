<x-layout.settings>
    <div class="px-4 sm:px-0">
        <x-title>
            Изменить пароль
        </x-title>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <x-form action="{{ route('user.settings.password.update') }}" method="post">
            <x-list>
                <x-list.item>
                    <x-slot:name>Текущий пароль</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="current_password" type="password" autofocus />
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
            <x-list>
                <x-list.item>
                    <x-slot:name>Новый пароль</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text type="password" name="password" />
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>

            <x-form.footer>
                <x-slot:buttons>
                    <x-button href="{{ route('user.settings') }}" color="white">
                        Отменить
                    </x-button>

                    <x-button type="submit">
                        Сохранить
                    </x-button>
                </x-slot:buttons>
            </x-form.footer>
        </x-form>
    </div>

</x-layout.settings>
