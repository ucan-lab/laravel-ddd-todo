<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

final readonly class GetTaskDetailUseCaseOutput
{
    public function __construct(
        public string $taskId,
        public string $taskName,
    ) {
    }
}
