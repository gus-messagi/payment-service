<?php

declare(strict_types=1);

namespace Src\Authentication\Application\UseCases;

use Illuminate\Support\Str;

use Src\Authentication\Application\Ports\CreateClientKeyPort;

final class CreateClientKeyUseCase implements CreateClientKeyPort
{
    public function __construct()
    {
    }

    public function handle(): array
    {
        $key = Str::random(64);
        $hashed = hash('sha256', $key);

        return [
            "plain" => $key,
            "hashed" => $hashed
        ];
    }
}