<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final class TaskListUseCaseInput
{
    public function __construct(
        public readonly string $userId,
        public readonly ?string $status,
    ) {
    }
}
