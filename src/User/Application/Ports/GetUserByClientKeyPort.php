<?php

declare(strict_types=1);

namespace Src\User\Application\Ports;

use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Domain\Entities\User;

interface GetUserByClientKeyPort
{
    public function handle(UserClientKey $clientKey): ?User;
}