<?php

declare(strict_types=1);

namespace Todo\Application\Service\Task;

use Todo\Domain\Model\Task\Status;
use Todo\Domain\Model\Task\Task;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Lang\UlidGenerator;

/**
 * タスクを作成する
 */
final readonly class CreateTaskUseCase
{
    public function __construct(
        private TaskRepository $taskRepository,
    ) {
    }

    public function createTask(CreateTaskUseCaseInput $input): CreateTaskUseCaseOutput
    {
        $task = Task::create(
            taskId: UlidGenerator::generate(),
            userId: $input->userId,
            name: $input->name,
            status: Status::Undone->value,
            dueDate: $input->dueDate,
            postponeCount: 0,
        );

        $this->taskRepository->store($task);

        return new CreateTaskUseCaseOutput();
    }
}
