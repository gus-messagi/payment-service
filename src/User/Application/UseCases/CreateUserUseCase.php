<?php

declare(strict_types=1);

namespace Src\User\Application\UseCases;

use Log;
use Src\User\Application\Dtos\Input\CreateUserInput;
use Src\User\Domain\Entities\User;
use Src\User\Infra\Repositories\UserRepositoryImpl;

final class CreateUserUseCase
{
    private UserRepositoryImpl $userRepository;

    public function __construct(UserRepositoryImpl $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserInput $input): void
    {
        $userFound = $this->userRepository->findByDocument($input->document);

        if ($userFound) {
            throw new \BadMethodCallException(sprintf("Document already registered %s", $input->document));
        }

        $user = new User($input->name, $input->email, $input->document);

        $this->userRepository->save($user);


    }
}