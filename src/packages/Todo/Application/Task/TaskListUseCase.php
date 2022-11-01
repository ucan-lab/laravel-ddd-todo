<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\Task\Status;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\Task\TaskSearchCondition;
use Todo\Domain\Model\User\UserId;

final class TaskListUseCase
{
    public function __construct(
        private readonly TaskRepository $repository,
    ) {
    }

    public function list(TaskListUseCaseInput $input): TaskListUseCaseOutput
    {
        $userId = UserId::fromString($input->userId);
        $status = $input->status ? Status::from($input->status) : null;

        $condition = new TaskSearchCondition($userId, $status);
        $taskList = $this->repository->restoreByCondition($condition);

        return new TaskListUseCaseOutput($taskList);
    }
}
