<?php

declare(strict_types=1);

namespace Src\User\Application\UseCases;

use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Application\Ports\GetUserByClientKeyPort;
use Src\User\Domain\Entities\User;
use Src\User\Domain\Repositories\UserRepository;
use Src\User\Infra\Repositories\UserRepositoryImpl;

final class GetUserByClientKeyUseCase implements GetUserByClientKeyPort
{
    private UserRepository $userRepository;

    public function __construct(UserRepositoryImpl $userRepositoryImpl)
    {
        $this->userRepository = $userRepositoryImpl;
    }

    public function handle(UserClientKey $clientKey): ?User
    {
        $user = $this->userRepository->findByClientKey($clientKey);

        return $user;
    }
}