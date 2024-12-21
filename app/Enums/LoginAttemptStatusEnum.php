<?php

namespace App\Enums;

enum LoginAttemptStatusEnum: string
{
    case success = 'success';
    case failed = 'failed';
    case confirmation = 'confirmation';
    case expired = 'expired';

    public function is(self $status): bool
    {
        return $this->value === $status->value;
    }
}
