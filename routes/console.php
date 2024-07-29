<?php

use App\Console\Commands\Email\CleanUpEmailCommand;
use App\Console\Commands\Email\ExpireEmailCommand;
use App\Console\Commands\Password\CleanUpPasswordCommand;
use App\Console\Commands\Password\ExpirePasswordCommand;

Schedule::command(ExpirePasswordCommand::class)
    ->everyMinute();

Schedule::command(CleanUpPasswordCommand::class)
    ->everyMinute();

Schedule::command(ExpireEmailCommand::class)
    ->everyMinute();

Schedule::command(CleanUpEmailCommand::class)
    ->everyMinute();
