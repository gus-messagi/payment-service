<?php

declare(strict_types=1);

namespace Src\User\Domain\Repositories;

use Src\User\Domain\Entities\User;
use Src\User\Domain\ValueObjects\UserDocument;

interface UserRepository
{
    public function findByDocument(UserDocument $document): ?User;
    public function save(User $user): void;
}