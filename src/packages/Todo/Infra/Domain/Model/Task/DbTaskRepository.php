<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\Task;

use App\Models\Task as EloquentTask;
use Illuminate\Contracts\Database\Query\Builder;
use Todo\Domain\Model\Task\Task;
use Todo\Domain\Model\Task\TaskFactory;
use Todo\Domain\Model\Task\TaskId;
use Todo\Domain\Model\Task\TaskList;
use Todo\Domain\Model\Task\TaskRepository;
use Todo\Domain\Model\Task\TaskSearchCondition;

final readonly class DbTaskRepository implements TaskRepository
{
    public function __construct(private TaskFactory $taskFactory)
    {
    }

    public function restoreById(TaskId $id): Task
    {
        $eloquentTask = EloquentTask::findOrFail($id->id());

        return $this->taskFactory->fromRepository(
            $eloquentTask->id,
            $eloquentTask->user_id,
            $eloquentTask->name,
            $eloquentTask->status,
            $eloquentTask->due_date->toDateTimeImmutable(),
            $eloquentTask->post_pone_count,
        );
    }

    public function restoreByCondition(TaskSearchCondition $condition): TaskList
    {
        $eloquentTaskList = EloquentTask::orderByDesc('status')
            ->when($condition->userId(), fn (Builder $builder) => $builder->where('user_id', $condition->userId()))
            ->when($condition->status(), fn (Builder $builder) => $builder->where('status', $condition->status()))
            ->orderByDesc('due_date')
            ->get();

        $taskList = [];

        foreach ($eloquentTaskList as $eloquentTask) {
            $taskList[] = $this->taskFactory->fromRepository(
                $eloquentTask->id,
                $eloquentTask->user_id,
                $eloquentTask->name,
                $eloquentTask->status,
                $eloquentTask->due_date->toDateTimeImmutable(),
                $eloquentTask->post_pone_count,
            );
        }

        return new TaskList($taskList);
    }

    public function store(Task $task): void
    {
        EloquentTask::updateOrCreate(
            [
                'id' => $task->id(),
            ], [
                'user_id' => $task->userId(),
                'name' => $task->name(),
                'status' => $task->status(),
                'due_date' => $task->dueDate()->format('Y-m-d'),
                'post_pone_count' => $task->postponeCount(),
            ],
        );
    }
}
