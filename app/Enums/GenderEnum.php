<?php

namespace App\Enums;

enum GenderEnum: string
{
    case male = 'male';
    case female = 'female';

    public static function select(): array
    {
        return [
            self::male->value => 'Мужчина',
            self::female->value => 'Женщина',
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::male => 'Мужчина',
            self::female => 'Женщина',
        };
    }
}
