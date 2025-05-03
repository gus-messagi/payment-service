<?php

declare(strict_types=1);

namespace Src\User\Application\Dtos\Input;

use Src\User\Domain\ValueObjects\UserDocument;
use Src\User\Domain\ValueObjects\UserEmail;

readonly class CreateUserInput
{
    public string $name;
    public UserDocument $document;
    public UserEmail $email;

    public function __construct(string $name, UserDocument $document, UserEmail $email)
    {
        $this->name = $name;
        $this->document = $document;
        $this->email = $email;
    }
}