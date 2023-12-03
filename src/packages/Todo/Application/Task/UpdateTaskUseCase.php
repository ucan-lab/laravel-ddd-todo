<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportId;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\AnotherUsersTaskException;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserRepository;
use Todo\Lang\UlidFactory;

/**
 * タスクを更新する
 */
final readonly class UpdateTaskUseCase
{
    public function __construct(
        private UserRepository $userRepository,
        private TaskRepository $taskRepository,
        private ActivityReportRepository $activityReportRepository,
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

        $activityReport = ActivityReport::updateTask(
            new ActivityReportId(UlidFactory::generate()),
            $task,
        );

        $this->activityReportRepository->create($activityReport);

        return new UpdateTaskUseCaseOutput();
    }
}
