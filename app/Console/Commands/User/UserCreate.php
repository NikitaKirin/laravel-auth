<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;

class UserCreate extends Command
{
    protected $signature = 'user:create';

    protected $description = 'Create the new user';

    public function handle()
    {
        $user = new User();
        $user->first_name = $this->ask('Имя', 'Test');
        $user->email = $this->ask('Email', 'test@test.com');
        $user->password = $this->ask('Password', 'test');
        $user->save();
        $this->info('Пользователь создан');
    }
}
