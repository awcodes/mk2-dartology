<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum UserStatus: string
{
    case Active = 'active';
    case Subscriber = 'subscriber';
    case Banned = 'banned';

    public static function humanNames(): array
    {
        $names = array_column(self::cases(), 'name');

        return array_map(function ($name) {
            return Str::of($name)->headline();
        }, $names);
    }

    public static function colors(): array
    {
        return array_combine([
            'warning', 'success', 'danger',
        ], self::values());
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::humanNames());
    }

    public static function slugs(): array
    {
        return array_combine(self::values(), self::values());
    }
}
