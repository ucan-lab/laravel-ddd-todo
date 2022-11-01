<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\Task;

use DateTimeImmutable;
use InvalidArgumentException;
use Todo\Domain\Model\Task\PostponeCount;
use Todo\Domain\Model\Task\Status;
use Todo\Domain\Model\Task\Task;
use Todo\Domain\Model\Task\TaskFactory;
use Todo\Domain\Model\Task\TaskId;
use Todo\Domain\Model\User\UserId;

final class ConcreteTaskFactory implements TaskFactory
{
    public function create(
        TaskId $id,
        UserId $userId,
        string $name,
        DateTimeImmutable $dueDate,
    ): Task {
        $name ?: throw new InvalidArgumentException('タスク名が空です。');

        return new Task(
            $id,
            $userId,
            $name,
            Status::Undone,
            $dueDate,
            PostponeCount::create(),
        );
    }

    public function fromRepository(
        string $id,
        string $userId,
        string $name,
        string $status,
        DateTimeImmutable $dueDate,
        int $postponeCount,
    ): Task {
        return new Task(
            TaskId::fromString($id),
            UserId::fromString($userId),
            $name,
            Status::from($status),
            $dueDate,
            PostponeCount::fromRepository($postponeCount),
        );
    }
}
