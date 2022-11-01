<?php

declare(strict_types=1);

namespace Todo\Lang;

use Closure;

interface UnitOfWork
{
    public function begin(): void;

    public function commit(): void;

    public function rollback(): void;

    public function transaction(Closure $callback, int $attempts = 1): mixed;
}
