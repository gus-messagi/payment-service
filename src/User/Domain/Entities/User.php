<?php
declare(strict_types=1);

namespace Src\User\Domain\Entities;

use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserDocument;

final class User
{
    public string $name;
    public UserEmail $email;
    public UserDocument $document;
    public string $clientKey;

    public function __construct(string $name, UserEmail $email, UserDocument $document, string $clientKey)
    {
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
        $this->clientKey = $clientKey;
    }
}