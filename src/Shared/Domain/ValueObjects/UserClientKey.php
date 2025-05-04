<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use InvalidArgumentException;
final class UserClientKey
{
    private string $value;

    public function __construct(string $value)
    {
        if (!$this->isValid($value)) {
            throw new InvalidArgumentException("Invalid CLIENT_KEY hash");
        }

        $this->value = $value;
    }

    private function isValid(string $value): bool
    {
        return preg_match('/^[a-f0-9]{64}$/i', $value) === 1;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}