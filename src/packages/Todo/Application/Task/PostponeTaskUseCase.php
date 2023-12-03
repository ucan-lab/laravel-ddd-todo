<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportId;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Lang\UlidFactory;

/**
 * タスクを延期する
 */
final readonly class PostponeTaskUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function postpone(PostponeTaskUseCaseInput $input): PostponeTaskUseCaseOutput
    {
        $task = $this->taskRepository->restoreById($input->taskId);
        $postponeTask = $task->postpone();

        $this->taskRepository->store($postponeTask);

        $activityReport = ActivityReport::postponeTask(
            new ActivityReportId(UlidFactory::generate()),
            $postponeTask,
        );

        $this->activityReportRepository->create($activityReport);

        return new PostponeTaskUseCaseOutput();
    }
}
