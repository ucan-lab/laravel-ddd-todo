<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Task\TaskDoneUseCase;
use Todo\Application\Task\TaskDoneUseCaseInput;
use Todo\Application\Task\TaskDoneUseCaseOutput;

final class TaskDoneUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function test未完了のタスクを完了にできること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Task $task */
        $task = Task::factory()->for($user)->undone()->create();

        $input = new TaskDoneUseCaseInput($task->id);
        $output = $this->app->make(TaskDoneUseCase::class)->done($input);

        $this->assertTrue($output instanceof TaskDoneUseCaseOutput);
    }
}
