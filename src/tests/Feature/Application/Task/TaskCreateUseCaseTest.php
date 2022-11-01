<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use DateTimeImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Task\TaskCreateUseCase;
use Todo\Application\Task\TaskCreateUseCaseInput;
use Todo\Application\Task\TaskCreateUseCaseOutput;
use Todo\Lang\UlidFactory;

final class TaskCreateUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function testタスクを作成できること(): void
    {
        $input = new TaskCreateUseCaseInput(UlidFactory::generate()->id(), 'テスト', new DateTimeImmutable());

        $output = $this->app->make(TaskCreateUseCase::class)->create($input);
        $this->assertTrue($output instanceof TaskCreateUseCaseOutput);
    }
}
