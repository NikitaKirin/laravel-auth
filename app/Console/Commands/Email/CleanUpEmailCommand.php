<?php

namespace App\Console\Commands\Email;

use App\Enums\EmailStatusEnum;
use App\Models\Email;
use Illuminate\Console\Command;

class CleanUpEmailCommand extends Command
{
    protected $signature = 'email:clean-up';


    protected $description = 'Command description';

    public function handle()
    {
        $this->warn('Searching rows...');
        $this->cleanUpPasswords();
        $this->info('Done!');
    }

    private function cleanUpPasswords(): void
    {
        Email::query()
            ->where(['status' => EmailStatusEnum::expired])
            ->orWhere(['status' => EmailStatusEnum::completed, 'created_at' => now()->subDay()])
            ->forceDelete();
    }
}
