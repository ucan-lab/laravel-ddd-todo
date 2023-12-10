<?php

declare(strict_types=1);

namespace Todo\Lang;

use DateTimeImmutable;

interface Clock
{
    public function now(): DateTimeImmutable;
}
