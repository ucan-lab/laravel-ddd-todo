<?php

declare(strict_types=1);

namespace Todo\Lang;

use InvalidArgumentException;
use LengthException;

final class Ulid
{
    private const ULID_LENGTH = 26;

    public function __construct(private readonly string $id)
    {
        if (mb_strlen($id) !== self::ULID_LENGTH) {
            throw new LengthException('Invalid base-32 uid provided.');
        }

        if (strspn($id, '0123456789abcdefghjkmnpqrstvwxyz') !== self::ULID_LENGTH) {
            throw new InvalidArgumentException('Invalid base-32 uid provided.');
        }
    }

    public function id(): string
    {
        return $this->id;
    }
}
