<?php

namespace App\Console\Commands\Password;

use App\Enums\PasswordStatusEnum;
use App\Models\Password;
use Illuminate\Console\Command;
use SebastianBergmann\Type\VoidType;

class CleanUpPasswordCommand extends Command
{

    protected $signature = 'password:clean-up';


    protected $description = 'Command description';

    public function handle()
    {
        $this->warn('Searching rows...');
        $this->cleanUpPasswords();
        $this->info('Done!');
    }

    private function cleanUpPasswords(): void
    {
        Password::query()
            ->where(['status' => PasswordStatusEnum::expired])
            ->orWhere(['status' => PasswordStatusEnum::completed, 'created_at' => now()->subDay()])
            ->forceDelete();
    }
}
