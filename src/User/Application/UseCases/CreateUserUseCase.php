<?php

declare(strict_types=1);

namespace Src\User\Application\UseCases;

use Log;
use Src\Authentication\Application\Ports\CreateClientKeyPort;
use Src\Authentication\Application\UseCases\CreateClientKeyUseCase;
use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Application\Dtos\Input\CreateUserInput;
use Src\User\Domain\Entities\User;
use Src\User\Infra\Repositories\UserRepositoryImpl;

final class CreateUserUseCase
{
    private UserRepositoryImpl $userRepository;
    private CreateClientKeyPort $createClientKeyPort;

    public function __construct(UserRepositoryImpl $userRepository, CreateClientKeyUseCase $createClientKeyPort)
    {
        $this->userRepository = $userRepository;
        $this->createClientKeyPort = $createClientKeyPort;
    }

    public function handle(CreateUserInput $input): array
    {
        $userFound = $this->userRepository->findByDocument($input->document);

        if ($userFound) {
            throw new \BadMethodCallException(sprintf("Document or Email already registered %s", $input->document));
        }

        ["plain" => $plain, "hashed" => $hashed] = $this->createClientKeyPort->handle();

        $clientKey = new UserClientKey($hashed);
        $user = new User($input->name, $input->email, $input->document, $clientKey);

        $this->userRepository->save($user);

        return ["clientKey" => $plain];
    }
}