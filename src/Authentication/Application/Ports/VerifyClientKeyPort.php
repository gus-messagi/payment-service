<?php

declare(strict_types=1);

namespace Src\Authentication\Application\Ports;

use Src\User\Domain\Entities\User;

interface VerifyClientKeyPort
{
    public function handle(string $plain): ?User;
}