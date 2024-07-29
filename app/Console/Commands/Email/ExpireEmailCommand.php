<?php

namespace App\Console\Commands\Email;

use App\Enums\EmailStatusEnum;
use App\Models\Email;
use Illuminate\Console\Command;

class ExpireEmailCommand extends Command
{
    protected $signature = 'email:expire';

    protected $description = 'Command description';

    public function handle()
    {
        $this->warn('Searching rows...');
        $this->expirePasswords();
        $this->info('Done!');
    }

    private function expirePasswords(): void
    {
        Email::query()
            ->where('status', EmailStatusEnum::pending)
            ->where('created_at', '<=', now()->subWeek())
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
