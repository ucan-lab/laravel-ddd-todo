<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Service\Task\PostponeTaskUseCase;
use Todo\Application\Service\Task\PostponeTaskUseCaseInput;
use Todo\Application\Service\Task\PostponeTaskUseCaseOutput;
use Todo\Domain\Model\Task\Status;

final class PostponeTaskUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function test未完了のタスクを1日延期できること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Task $task */
        $task = Task::factory()->for($user)->created()->create(['due_date' => '2022-01-01']);

        $input = new PostponeTaskUseCaseInput($task->id);
        $output = $this->app->make(PostponeTaskUseCase::class)->postpone($input);

        $this->assertInstanceOf(PostponeTaskUseCaseOutput::class, $output);

        $task->refresh();

        $this->assertSame(Status::Undone->value, $task->status);
        $this->assertSame(1, $task->post_pone_count);
        $this->assertSame('2022-01-02', $task->due_date->format('Y-m-d'));
    }
}
