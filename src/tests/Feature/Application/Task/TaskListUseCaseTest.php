<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Task\TaskListUseCase;
use Todo\Application\Task\TaskListUseCaseInput;
use Todo\Application\Task\TaskListUseCaseOutput;
use Todo\Domain\Model\Task\Status;

final class TaskListUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function testタスクの一覧を取得できること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Task::factory()->for($user)->undone()->count(3)->create();
        Task::factory()->for($user)->done()->count(3)->create();

        $input = new TaskListUseCaseInput($user->id, null);
        $output = $this->app->make(TaskListUseCase::class)->list($input);

        $this->assertTrue($output instanceof TaskListUseCaseOutput);
        $this->assertCount(6, $output->taskList);
    }

    public function test他のユーザーのタスクを取得できないこと(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create();

        /** @var User $user2 */
        $user2 = User::factory()->create();

        Task::factory()->for($user1)->undone()->count(3)->create();
        Task::factory()->for($user1)->done()->count(3)->create();

        $input = new TaskListUseCaseInput($user2->id, null);
        $output = $this->app->make(TaskListUseCase::class)->list($input);

        $this->assertTrue($output instanceof TaskListUseCaseOutput);
        $this->assertCount(0, $output->taskList);
    }

    public function test未完了のタスクのみ取得できること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Task::factory()->for($user)->undone()->count(2)->create();
        Task::factory()->for($user)->done()->count(3)->create();

        $input = new TaskListUseCaseInput($user->id, Status::Undone->value);
        $output = $this->app->make(TaskListUseCase::class)->list($input);

        $this->assertTrue($output instanceof TaskListUseCaseOutput);
        $this->assertCount(2, $output->taskList);
    }

    public function test完了のタスクのみ取得できること(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        Task::factory()->for($user)->undone()->count(2)->create();
        Task::factory()->for($user)->done()->count(3)->create();

        $input = new TaskListUseCaseInput($user->id, Status::Done->value);
        $output = $this->app->make(TaskListUseCase::class)->list($input);

        $this->assertTrue($output instanceof TaskListUseCaseOutput);
        $this->assertCount(3, $output->taskList);
    }
}
