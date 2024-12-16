<x-layout.auth>
    <x-slot:title>Подтверждение почты</x-slot:title>

    <x-card>
        <x-card.body>
            Перейдите по ссылке, отправленной на ваш email.

            <div class="pt-4">
                Или введите код подтверждения:

                <x-form class="mt-3" method="post" action="{{ route('email.confirm', $email->uuid) }}">
                    <div class="grid grid-cols-5 gap-x-4">
                        <div class="col-span-3">
                            <x-form.text inputmode="decimal" placeholder="123456" name="code" />
                        </div>
                        <div class="col-span-2">
                            <x-button type="submit">Подтвердить</x-button>
                        </div>
                    </div>
                </x-form>
            </div>
        </x-card.body>
    </x-card>

    @unless (session('email-confirmation-sent'))
        <x-slot:crosslink>
            <x-link href="#" x-data x-on:click.prevent="$refs.form.submit()">
                Отправить еще раз

                <x-form class="d-none" x-ref="form" action="{{ route('email.confirmation.send', $email->uuid) }}" method="post" />
            </x-link>
        </x-slot:crosslink>
    @endunless
</x-layout.auth>
