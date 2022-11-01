<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

interface TaskRepository
{
    public function restoreById(TaskId $id): Task;

    public function restoreByCondition(TaskSearchCondition $condition): TaskList;

    public function store(Task $task): void;
}
