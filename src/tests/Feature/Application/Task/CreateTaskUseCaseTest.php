<?php

declare(strict_types=1);

namespace Tests\Feature\Application\Task;

use DateTimeImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Task\CreateTaskUseCase;
use Todo\Application\Task\CreateTaskUseCaseInput;
use Todo\Application\Task\CreateTaskUseCaseOutput;
use Todo\Lang\UlidFactory;

final class CreateTaskUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function testタスクを作成できること(): void
    {
        $input = new CreateTaskUseCaseInput(UlidFactory::generate()->id(), 'テスト', new DateTimeImmutable());

        $output = $this->app->make(CreateTaskUseCase::class)->createTask($input);
        $this->assertTrue($output instanceof CreateTaskUseCaseOutput);
    }
}
