<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\Task\AnotherUsersTaskException;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserRepository;

/**
 * タスクを更新する
 */
final readonly class UpdateTaskUseCase
{
    public function __construct(
        private UserRepository $userRepository,
        private TaskRepository $taskRepository,
    ) {
    }

    public function updateTask(UpdateTaskUseCaseInput $input): UpdateTaskUseCaseOutput
    {
        $user = $this->userRepository->restoreById($input->userId);
        $task = $this->taskRepository->restoreById($input->taskId);

        if (! $user->hasTask($task)) {
            throw new AnotherUsersTaskException('参照できないタスクです。');
        }

        $updatedTask = $task->changeTaskName($input->taskName);

        $this->taskRepository->store($updatedTask);

        return new UpdateTaskUseCaseOutput();
    }
}
