<?php

declare(strict_types=1);

namespace Src\Authentication\Application\Ports;

use Src\Authentication\Application\Ports\Dtos\CreateClientKeyInputDto;

interface CreateClientKeyPort
{
    public function handle(): array;
}