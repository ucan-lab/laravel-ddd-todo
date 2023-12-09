<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\Task\TaskRepository;

/**
 * タスクを完了にする
 */
final readonly class DoneTaskUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
    ) {
    }

    public function done(DoneTaskUseCaseInput $input): DoneTaskUseCaseOutput
    {
        $task = $this->taskRepository->restoreById($input->taskId);
        $doneTask = $task->done();

        $this->taskRepository->store($doneTask);

        return new DoneTaskUseCaseOutput();
    }
}
