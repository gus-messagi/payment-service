<?php
declare(strict_types=1);

namespace Src\User\Domain\ValueObjects;

use InvalidArgumentException;

final class UserEmail
{
    private $value;

    public function __construct(string $email)
    {
        $this->validate($email);
        $this->value = $email;
    }

    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('Invalid email: %s', $email)
            );
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}