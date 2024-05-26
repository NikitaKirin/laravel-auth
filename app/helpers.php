<?php

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
