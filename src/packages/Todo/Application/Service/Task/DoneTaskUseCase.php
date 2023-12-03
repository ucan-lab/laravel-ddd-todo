<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\ActivityReport\ActivityReportFactory;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;
use Todo\Domain\Model\Task\TaskRepository;

/**
 * タスクを完了にする
 */
final readonly class DoneTaskUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
        private ActivityReportFactory $activityReportFactory,
        private ActivityReportRepository $activityReportRepository,
    ) {
    }

    public function done(DoneTaskUseCaseInput $input): DoneTaskUseCaseOutput
    {
        $task = $this->taskRepository->restoreById($input->taskId);
        $doneTask = $task->done();

        $this->taskRepository->store($doneTask);

        $activityReport = $this->activityReportFactory->doneTask(
            $doneTask,
        );

        $this->activityReportRepository->create($activityReport);

        return new DoneTaskUseCaseOutput();
    }
}
