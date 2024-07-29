<?php

namespace App\Events\User;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;

class UserCreatedEvent implements ShouldQueueAfterCommit
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public User $user,
    ) {
    }
}
