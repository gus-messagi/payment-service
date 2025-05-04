<?php

declare(strict_types=1);

namespace Src\Authentication\Application\UseCases;

use Src\Authentication\Application\Ports\VerifyClientKeyPort;
use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Application\Ports\GetUserByClientKeyPort;
use Src\User\Application\UseCases\GetUserByClientKeyUseCase;
use Src\User\Domain\Entities\User;

final class VerifyClientKeyUseCase implements VerifyClientKeyPort
{
    private GetUserByClientKeyPort $getUserByClientKeyUseCase;

    public function __construct(GetUserByClientKeyUseCase $getUserByClientKeyUseCase)
    {
        $this->getUserByClientKeyUseCase = $getUserByClientKeyUseCase;
    }

    public function handle(string $plain): ?User
    {
        $hashed = hash('sha256', $plain);
        $userClientKey = new UserClientKey($hashed);

        return $this->getUserByClientKeyUseCase->handle($userClientKey);
    }
}