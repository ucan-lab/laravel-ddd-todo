<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final class TaskPostponeUseCaseInput
{
    public function __construct(
        public readonly string $taskId,
    ) {
    }
}
