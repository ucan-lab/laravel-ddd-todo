<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

final readonly class UserName
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
