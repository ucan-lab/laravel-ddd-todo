<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\Task\AnotherUsersTaskException;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserRepository;

/**
 * タスク詳細取得
 */
final readonly class GetTaskDetailUseCase
{
    public function __construct(
        private UserRepository $userRepository,
        private TaskRepository $taskRepository,
    ) {
    }

    public function getTaskDetail(GetTaskDetailUseCaseInput $input): GetTaskDetailUseCaseOutput
    {
        $user = $this->userRepository->restoreById($input->userId);
        $task = $this->taskRepository->restoreById($input->taskId);

        if (! $user->hasTask($task)) {
            throw new AnotherUsersTaskException('参照できないタスクです。');
        }

        return new GetTaskDetailUseCaseOutput(
            taskId: $task->id(),
            taskName: $task->name(),
        );
    }
}
