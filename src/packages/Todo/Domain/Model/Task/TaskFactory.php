<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

use DateTimeImmutable;
use Todo\Domain\Model\User\UserId;

interface TaskFactory
{
    public function create(
        TaskId $id,
        UserId $userId,
        string $name,
        DateTimeImmutable $dueDate
    ): Task;

    public function fromRepository(
        string $id,
        string $userId,
        string $name,
        string $status,
        DateTimeImmutable $dueDate,
        int $postponeCount
    ): Task;
}
