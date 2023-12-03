<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

final readonly class GetTaskDetailUseCaseInput
{
    public function __construct(
        public string $userId,
        public string $taskId,
    ) {
    }
}
