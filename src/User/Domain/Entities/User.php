<?php
declare(strict_types=1);

namespace Src\User\Domain\Entities;

use Src\Shared\Domain\ValueObjects\UserClientKey;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserDocument;

final class User
{
    public ?int $id = null;
    public string $name;
    public UserEmail $email;
    public UserDocument $document;
    public UserClientKey $clientKey;

    public function __construct(string $name, UserEmail $email, UserDocument $document, UserClientKey $clientKey, ?int $id = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
        $this->clientKey = $clientKey;
        $this->id = $id;
    }
}