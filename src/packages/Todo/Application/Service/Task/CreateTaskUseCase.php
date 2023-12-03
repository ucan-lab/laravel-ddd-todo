<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\ActivityReport\ActivityReportFactory;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskFactory;
use Todo\Domain\Model\Task\TaskRepository;

/**
 * タスクを作成する
 */
final readonly class CreateTaskUseCase
{
    public function __construct(
        private TaskFactory $taskFactory,
        private TaskRepository $taskRepository,
        private ActivityReportFactory $activityReportFactory,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function createTask(CreateTaskUseCaseInput $input): CreateTaskUseCaseOutput
    {
        $task = $this->taskFactory->create(
            $input->userId,
            $input->name,
            $input->dueDate
        );

        $this->taskRepository->store($task);

        $activityReport = $this->activityReportFactory->createTask(
            $task,
        );

        $this->activityReportRepository->create($activityReport);

        return new CreateTaskUseCaseOutput();
    }
}
