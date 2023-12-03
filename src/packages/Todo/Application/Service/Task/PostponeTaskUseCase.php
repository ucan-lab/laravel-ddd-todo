<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\ActivityReport\ActivityReportFactory;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskRepository;

/**
 * タスクを延期する
 */
final readonly class PostponeTaskUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
        private ActivityReportFactory $activityReportFactory,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function postpone(PostponeTaskUseCaseInput $input): PostponeTaskUseCaseOutput
    {
        $task = $this->taskRepository->restoreById($input->taskId);
        $postponeTask = $task->postpone();

        $this->taskRepository->store($postponeTask);

        $activityReport = $this->activityReportFactory->postponeTask(
            $postponeTask,
        );

        $this->activityReportRepository->create($activityReport);

        return new PostponeTaskUseCaseOutput();
    }
}
