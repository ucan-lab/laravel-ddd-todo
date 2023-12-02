<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportId;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskId;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Lang\UlidFactory;

final readonly class TaskDoneUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function done(TaskDoneUseCaseInput $input): TaskDoneUseCaseOutput
    {
        $task = $this->taskRepository->restoreById(TaskId::fromString($input->taskId));
        $doneTask = $task->done();

        $this->taskRepository->store($doneTask);

        $activityReport = ActivityReport::doneTask(
            new ActivityReportId(UlidFactory::generate()),
            $doneTask,
        );

        $this->activityReportRepository->create($activityReport);

        return new TaskDoneUseCaseOutput();
    }
}
