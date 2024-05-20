<?php

function app_url(string $path = ''): string
{
    return implode('/', [
        trim(config('app.url'), '/'),
        trim($path, '/'),
    ]);
}
