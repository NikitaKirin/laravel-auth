<?php

namespace App\Enums;

enum EmailStatusEnum: string
{
    case pending = 'pending';
    case completed = 'completed';
    case expired = 'expired';

    public function is(self $status): bool
    {
        return $this->value === $status->value;
    }
}
