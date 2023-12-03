<?php

declare(strict_types=1);

namespace Todo\Lang;

abstract readonly class Identifier
{
    public function __construct(private string $id)
    {
    }

    final public function id(): string
    {
        return $this->id;
    }

    final public function equals(string $id): bool
    {
        return $this->id === $id;
    }
}
