<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Task\TaskPostponeUseCase;
use Todo\Application\Task\TaskPostponeUseCaseInput;
use Todo\Application\Task\TaskPostponeUseCaseOutput;
use Todo\Domain\Model\Task\Status;

final class TaskPostponeUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function test未完了のタスクを1日延期できること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Task $task */
        $task = Task::factory()->for($user)->created()->create(['due_date' => '2022-01-01']);

        $input = new TaskPostponeUseCaseInput($task->id);
        $output = $this->app->make(TaskPostponeUseCase::class)->postpone($input);

        $this->assertTrue($output instanceof TaskPostponeUseCaseOutput);

        $task->refresh();

        $this->assertSame(Status::Undone->value, $task->status);
        $this->assertSame(1, $task->post_pone_count);
        $this->assertSame('2022-01-02', $task->due_date->format('Y-m-d'));
    }
}
