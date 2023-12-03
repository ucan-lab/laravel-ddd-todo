<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

interface TaskRepository
{
    public function restoreById(string $id): Task;

    public function restoreByCondition(TaskSearchCondition $condition): TaskList;

    public function store(Task $task): void;
}
