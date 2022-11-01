<?php

declare(strict_types=1);

namespace Todo\Lang;

use Illuminate\Support\Str;

final class UlidFactory
{
    public static function generate(): Ulid
    {
        return new Ulid(mb_strtolower(Str::ulid()->toBase32()));
    }
}
