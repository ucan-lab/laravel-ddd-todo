<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final readonly class UpdateTaskUseCaseInput
{
    public function __construct(
        public string $userId,
        public string $taskId,
        public string $taskName,
    ) {
    }
}
