<?php

declare(strict_types=1);

namespace Todo\Lang;

abstract readonly class Identifier
{
    private function __construct(private Ulid $id)
    {
    }

    final public function id(): string
    {
        return $this->id->id();
    }

    /**
     * @return $this
     */
    final public static function create(Ulid $id): static
    {
        return new static($id);
    }

    /**
     * @return $this
     */
    final public static function fromString(string $id): static
    {
        return new static(new Ulid($id));
    }
}