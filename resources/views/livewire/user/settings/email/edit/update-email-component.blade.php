<div>
    @switch($currentStep)
        @case('update')
            <x-form wire:submit="update" method="post" wire:key="email-update">
                <x-list>
                    <x-list.item>
                        <x-slot:name>Новый email</x-slot:name>
                        <x-slot:value>
                            <div class="grid grid-cols-2">
                                <div class="col-span-2 md:col-span-1">
                                    <x-form.text type="email" name="email" wire:model="email"/>
                                </div>
                            </div>
                        </x-slot:value>
                    </x-list.item>
                </x-list>

                <x-form.footer>
                    <x-slot:buttons>
                        <x-button href="{{ route('user.settings') }}" wire:navigate color="white">
                            Отменить
                        </x-button>

                        <x-button type="submit">
                            Сохранить
                        </x-button>
                    </x-slot:buttons>
                </x-form.footer>
            </x-form>
            @break
        @case('confirm')
            <div class="mt-1">Введите код подтверждения, отправленный на ваш email</div>
            <x-form class="mt-3" method="post" wire:key="email-confirm" wire:submit="confirm">
                <div class="grid grid-cols-5 gap-x-4">
                    <div class="col-span-3">
                        <x-form.text inputmode="decimal" placeholder="123456" name="code" wire:model="code"/>
                    </div>
                </div>
                <x-form.footer>
                    <x-slot:buttons>
                        <x-button wire:click="setStep('update')" wire:navigate color="white">
                            Отменить
                        </x-button>
                        <div class="col-span-2">
                            <x-button type="submit">Подтвердить</x-button>
                        </div>
                    </x-slot:buttons>
                </x-form.footer>
            </x-form>
    @endswitch
</div>
