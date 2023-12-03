<?php

declare(strict_types=1);

namespace Todo\Lang;

use Illuminate\Support\Str;

final class UlidGenerator
{
    public static function generate(): string
    {
        return mb_strtolower(Str::ulid()->toBase32());
    }
}
