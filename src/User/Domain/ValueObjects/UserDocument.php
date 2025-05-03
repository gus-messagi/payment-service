<?php

namespace Src\User\Domain\ValueObjects;

use InvalidArgumentException;

final class UserDocument
{
    private string $value;
    private string $regex = '/([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})/';

    public function __construct(string $document)
    {
        $this->validate($document);
        $this->value = $document;
    }

    private function validate(string $document): void
    {
        if (
            !filter_var(
                $document,
                FILTER_VALIDATE_REGEXP,
                ["options" => ["regexp" => $this->regex]]
            )
        ) {
            throw new InvalidArgumentException(
                sprintf('Invalid document: %s', $document)
            );
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}