@php use App\Enums\GenderEnum; @endphp
<x-layout.settings>
    <div class="px-4 sm:px-0">
        <x-title>
            Изменить персональные данные
        </x-title>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <x-form action="{{ route('user.settings.profile.update') }}" method="post">
            <x-list>
                <x-list.item>
                    <x-slot:name>Имя</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="first_name" :value="$user->first_name" autofocus/>
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
            <x-list>
                <x-list.item>
                    <x-slot:name>Отчество</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="middle_name" :value="$user->middle_name"/>
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
            <x-list>
                <x-list.item>
                    <x-slot:name>Фамилия</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="last_name" :value="$user->last_name"/>
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
            <x-list>
                <x-list.item>
                    <x-slot:name>Пол</x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.select name="gender" :value="$user->gender?->value"
                                               :options="GenderEnum::select()"/>
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
