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
use Todo\Lang\UlidGenerator;

final class ConcreteTaskFactory implements TaskFactory
{
    public function create(
        string $userId,
        string $name,
        DateTimeImmutable $dueDate,
    ): Task {
        $name ?: throw new InvalidArgumentException('タスク名が空です。');

        return new Task(
            id: new TaskId(UlidGenerator::generate()),
            userId: new UserId($userId),
            name: $name,
            status: Status::Undone,
            dueDate: $dueDate,
            postponeCount: PostponeCount::create(),
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
            id: new TaskId($id),
            userId: new UserId($userId),
            name: $name,
            status: Status::from($status),
            dueDate: $dueDate,
            postponeCount: PostponeCount::fromRepository($postponeCount),
        );
    }
}
