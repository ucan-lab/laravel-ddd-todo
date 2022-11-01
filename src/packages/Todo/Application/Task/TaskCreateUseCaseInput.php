<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use DateTimeImmutable;

final class TaskCreateUseCaseInput
{
    public function __construct(
        public readonly string $userId,
        public readonly string $name,
        public readonly DateTimeImmutable $dueDate
    ) {
    }
}
