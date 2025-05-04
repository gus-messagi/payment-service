<?php

declare(strict_types=1);

namespace Src\User\Infra\Repositories;

use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Domain\Entities\User;
use Src\User\Domain\Repositories\UserRepository;
use Src\User\Domain\ValueObjects\UserDocument;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Infra\Models\UserModel;

final class UserRepositoryImpl implements UserRepository
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function findByDocument(UserDocument $document): ?User
    {
        $userFound = $this->model->where('document', $document->getValue())->first();

        if (!$userFound) {
            return null;
        }

        return new User(
            $userFound->name,
            new UserEmail($userFound->email),
            new UserDocument($userFound->document),
            $userFound->client_key,
        );
    }

    public function save(User $user): void
    {
        $this->model->insert([
            "name" => $user->name,
            "document" => $user->document->getValue(),
            "email" => $user->email->getValue(),
            "client_key" => $user->clientKey,
        ]);
    }

    public function findByClientKey(UserClientKey $clientKey): ?User
    {
        $userFound = $this->model->where('client_key', $clientKey->getValue())->first();

        if (!$userFound) {
            return null;
        }

        return new User(
            $userFound->name,
            new UserEmail($userFound->email),
            new UserDocument($userFound->document),
            $userFound->client_key,
        );
    }
}