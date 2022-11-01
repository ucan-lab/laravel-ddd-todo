<?php

declare(strict_types=1);

namespace Todo\Domain\Model\User;

interface Password
{
    public function value(): string;
}
