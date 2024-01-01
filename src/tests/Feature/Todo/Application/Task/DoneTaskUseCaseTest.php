<?php

declare(strict_types=1);

namespace Feature\Todo\Application\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Service\Task\DoneTaskUseCase;
use Todo\Application\Service\Task\DoneTaskUseCaseInput;
use Todo\Application\Service\Task\DoneTaskUseCaseOutput;

final class DoneTaskUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function test未完了のタスクを完了にできること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Task $task */
        $task = Task::factory()->for($user)->undone()->create();

        $input = new DoneTaskUseCaseInput($task->id);
        $output = $this->app->make(DoneTaskUseCase::class)->done($input);

        $this->assertTrue($output instanceof DoneTaskUseCaseOutput);
    }
}