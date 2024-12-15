<?php

use Illuminate\Support\Str;

function app_url(string $path = ''): string
{
    return implode('/', array_filter([
        trim(config('app.url'), '/'),
        trim($path, '/'),
    ]));
}

function uuid(): string
{
    return Str::uuid()->toString();
}

function code(): string
{
    return (string) rand(100_000, 999_990);
}
