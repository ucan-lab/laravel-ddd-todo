<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\Task\TaskList;

final readonly class TaskListUseCaseOutput
{
    public function __construct(
        public TaskList $taskList,
    ) {
    }
}
