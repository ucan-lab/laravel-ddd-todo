<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\Task\TaskList;

final readonly class GetTaskListUseCaseOutput
{
    public function __construct(
        public TaskList $taskList,
    ) {
    }
}
