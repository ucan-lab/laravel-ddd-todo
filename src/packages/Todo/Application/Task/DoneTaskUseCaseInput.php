<?php

declare(strict_types=1);

namespace Todo\Application\Task;

final readonly class DoneTaskUseCaseInput
{
    public function __construct(
        public string $taskId,
    ) {
    }
}
