<x-layout.auth>
    <x-slot:title>Подтверждение почты</x-slot:title>

    <x-card>
        <x-card.body>
            Перейдите по ссылке, отправленной на ваш email.
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
