<?php

use App\Console\Commands\Password\CleanUpPasswordCommand;
use App\Console\Commands\Password\ExpirePasswordCommand;

Schedule::command(ExpirePasswordCommand::class)
    ->everyMinute();

Schedule::command(CleanUpPasswordCommand::class)
    ->everyMinute();
