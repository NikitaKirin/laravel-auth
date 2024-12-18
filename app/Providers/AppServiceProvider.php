<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\VKontakte\Provider as VkontakteProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->setPasswordDefaults();
        $this->initExtendSocialiteDrivers();
    }

    private function setPasswordDefaults(): void
    {
        Password::defaults(function () {
            $rule = Password::min(8);

            return $this->app->isProduction()
                ? $rule->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
                : $rule;
        });
    }

    private function initExtendSocialiteDrivers(): void
    {
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('vkontakte', VkontakteProvider::class);
        });
    }
}
