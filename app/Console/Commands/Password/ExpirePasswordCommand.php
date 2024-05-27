<?php

namespace App\Console\Commands\Password;

use App\Enums\PasswordStatusEnum;
use App\Models\Password;
use Illuminate\Console\Command;

class ExpirePasswordCommand extends Command
{
    protected $signature = 'password:expire';

    protected $description = 'Command description';

    public function handle()
    {
        $this->warn('Searching rows...');
        $this->expirePasswords();
        $this->info('Done!');
    }

    private function expirePasswords(): void
    {
        Password::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=', now()->subHours(3))
            ->update(['status' => PasswordStatusEnum::expired]);
    }
}
