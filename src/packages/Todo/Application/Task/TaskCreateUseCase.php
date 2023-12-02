<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportId;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskFactory;
use Todo\Domain\Model\Task\TaskId;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\User\UserId;
use Todo\Lang\UlidFactory;

final readonly class TaskCreateUseCase
{
    public function __construct(
        private TaskFactory $taskFactory,
        private TaskRepository $taskRepository,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function create(TaskCreateUseCaseInput $input): TaskCreateUseCaseOutput
    {
        $task = $this->taskFactory->create(
            TaskId::create(UlidFactory::generate()),
            UserId::fromString($input->userId),
            $input->name,
            $input->dueDate
        );

        $this->taskRepository->store($task);

        $activityReport = ActivityReport::createTask(
            new ActivityReportId(UlidFactory::generate()),
            $task,
        );

        $this->activityReportRepository->create($activityReport);

        return new TaskCreateUseCaseOutput();
    }
}
