<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final class TaskDoneUseCaseInput
{
    public function __construct(
        public readonly string $taskId,
    ) {
    }
}
