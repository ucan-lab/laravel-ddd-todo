<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final readonly class TaskListUseCaseInput
{
    public function __construct(
        public string $userId,
        public ?string $status,
    ) {
    }
}
