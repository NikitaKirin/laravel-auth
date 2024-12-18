<div>
    <div class="relative mt-10">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center text-sm font-medium leading-6">
            <span class="bg-white px-6 text-gray-900">Или продолжить с</span>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-2 gap-4">
        @if(config('services.github.client_id') && config('services.github.client_secret'))
            <a href="{{ route('auth.social.redirect', ['driver' => \App\Enums\SocialDriverEnum::github]) }}"
               class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                <svg class="h-5 w-5 fill-[#24292F]" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm font-semibold leading-6">GitHub</span>
            </a>
        @endif
        @if(config('services.vkontakte.client_id') && config('services.vkontakte.client_secret'))
            <a href="{{ route('auth.social.redirect', ['driver' => \App\Enums\SocialDriverEnum::vkontakte]) }}"
               class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-[#24292F]" fill="currentColor"
                     viewBox="0 0 48 48">
                    <path fill="#1976d2" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                    <path fill="#fff"
                          d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"></path>
                </svg>
                <span class="text-sm font-semibold leading-6">ВКонтакте</span>
            </a>
        @endif
    </div>
</div>
