<?php

declare(strict_types=1);

namespace Todo\Infra\Lang;

use DateTimeImmutable;
use Todo\Lang\Clock;

final class SystemClock implements Clock
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
