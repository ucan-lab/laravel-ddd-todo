<?php

declare(strict_types=1);

namespace Feature\Todo\Application\Task;

use DateTimeImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Todo\Application\Service\Task\CreateTaskUseCase;
use Todo\Application\Service\Task\CreateTaskUseCaseInput;
use Todo\Application\Service\Task\CreateTaskUseCaseOutput;
use Todo\Lang\UlidGenerator;

final class CreateTaskUseCaseTest extends TestCase
{
    use RefreshDatabase;

    public function testタスクを作成できること(): void
    {
        $input = new CreateTaskUseCaseInput(UlidGenerator::generate(), 'テスト', new DateTimeImmutable());

        $output = $this->app->make(CreateTaskUseCase::class)->createTask($input);
        $this->assertInstanceOf(CreateTaskUseCaseOutput::class, $output);
    }
}
