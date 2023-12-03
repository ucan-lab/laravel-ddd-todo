<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

final readonly class PostponeTaskUseCaseInput
{
    public function __construct(
        public string $taskId,
    ) {
    }
}
