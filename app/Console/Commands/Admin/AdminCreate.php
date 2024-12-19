<?php

namespace App\Console\Commands\Admin;

use App\Models\Admin;
use Illuminate\Console\Command;

class AdminCreate extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create the new admin';

    public function handle(): void
    {
        $admin = new Admin();
        $admin->name = $this->ask('Имя', 'Test');
        $admin->email = $this->ask('Email', 'test@test.com');
        $admin->password = $this->ask('PasswordController', 'test');
        $admin->save();
        $this->info('Пользователь создан');
    }
}
