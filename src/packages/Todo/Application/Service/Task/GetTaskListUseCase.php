<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\Task\Status;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\Task\TaskSearchCondition;
use Todo\Domain\Model\User\UserId;

/**
 * タスクの一覧を取得する
 */
final readonly class GetTaskListUseCase
{
    public function __construct(
        private TaskRepository $repository,
    ) {
    }

    public function list(GetTaskListUseCaseInput $input): GetTaskListUseCaseOutput
    {
        $userId = new UserId($input->userId);
        $status = $input->status ? Status::from($input->status) : null;

        $condition = new TaskSearchCondition($userId, $status);
        $taskList = $this->repository->restoreByCondition($condition);

        return new GetTaskListUseCaseOutput($taskList);
    }
}
