<?php

declare(strict_types=1);

namespace Todo\Infra\Lang;

use Closure;
use Illuminate\Database\ConnectionInterface;
use Throwable;
use Todo\Lang\UnitOfWork;

final readonly class ConcreteUnitOfWork implements UnitOfWork
{
    public function __construct(private ConnectionInterface $connection)
    {
    }

    public function begin(): void
    {
        $this->connection->beginTransaction();
    }

    public function commit(): void
    {
        $this->connection->commit();
    }

    public function rollback(): void
    {
        $this->connection->rollBack();
    }

    /**
     * @throws Throwable
     */
    public function transaction(Closure $callback, int $attempts = 1): mixed
    {
        return $this->connection->transaction($callback, $attempts);
    }
}
