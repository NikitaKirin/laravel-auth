<?php

namespace App\Traits;

use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use PragmaRX\Google2FA\Google2FA;

/**
 * @property bool google_confirmation_enable
 * @property string google_confirmation_secret
 * @property string $email
 */
trait HasTwoFactoryGoogleConfirmation
{
    public function isGoogleConfirmationEnabled(): bool
    {
        return $this->google_confirmation_enable;
    }

    /**
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function generateSecretKey(): bool
    {
        $google2fa = new Google2FA();
        return $this->update(['google_confirmation_secret' => $google2fa->generateSecretKey()]);
    }

    public function getGoogleConfirmationSecret(): ?string
    {
        return $this->google_confirmation_secret;
    }

    public function getQRCodeUrl(): string
    {
        $google2fa = new Google2FA();
        return $google2fa->getQRCodeUrl(
            config('app.name'),
            $this->email,
            $this->getGoogleConfirmationSecret(),
        );
    }

    /**
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws SecretKeyTooShortException
     * @throws InvalidCharactersException
     */
    public function verifyCode(string $code): bool
    {
        $google2fa = new Google2FA();
        return (bool)$google2fa->verifyKey($this->getGoogleConfirmationSecret(), $code);
    }

    public function activateGoogleConfirmation(): bool
    {
        return $this->update(['google_confirmation_enable' => true]);
    }

    public function inactivateGoogleConfirmation(): bool
    {
        return $this->update(['google_confirmation_enable' => false, 'google_confirmation_secret' => null]);
    }
}
