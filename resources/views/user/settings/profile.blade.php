<div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
</div>
<div class="mt-6 border-t border-gray-100">
    <x-list>
        <x-list.item>
            <x-slot:name>Имя</x-slot:name>
            <x-slot:description>{{ $user->getFullName() }}</x-slot:description>
            <x-slot:action>
                <x-link>Изменить</x-link>
            </x-slot:action>
        </x-list.item>
    </x-list>
    <x-list>
        <x-list.item>
            <x-slot:name>Пол</x-slot:name>
            <x-slot:description>{{ $user->gender->name() }}</x-slot:description>
            <x-slot:action>
                <x-link>Изменить</x-link>
            </x-slot:action>
        </x-list.item>
    </x-list>
</div>
