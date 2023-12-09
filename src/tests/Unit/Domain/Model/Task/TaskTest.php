<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Model\Task;

use DateTimeImmutable;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Todo\Domain\Model\Task\PostponeCount;
use Todo\Domain\Model\Task\Status;
use Todo\Domain\Model\Task\Task;
use Todo\Domain\Model\Task\TaskId;
use Todo\Domain\Model\User\UserId;
use Todo\Lang\UlidGenerator;

final class TaskTest extends TestCase
{
    public function testタスクを新しく作成できること(): void
    {
        $taskId = new TaskId(UlidGenerator::generate());
        $userId = new UserId(UlidGenerator::generate());
        $name = 'テスト';
        $dueDate = new DateTimeImmutable('2022-01-01');

        $task = $this->createNewTask($taskId, $userId, $name, $dueDate);

        $this->assertSame($taskId->id(), $task->id());
        $this->assertSame($userId->id(), $task->userId());
        $this->assertSame($name, $task->name());
        $this->assertSame(Status::Undone->value, $task->status());
        $this->assertEquals(new DateTimeImmutable('2022-01-01'), $task->dueDate());
        $this->assertSame(0, $task->postponeCount());
    }

    public function testタスクを完了にできること(): void
    {
        $taskId = new TaskId(UlidGenerator::generate());
        $userId = new UserId(UlidGenerator::generate());
        $name = 'テスト';
        $dueDate = new DateTimeImmutable('2022-01-01');

        $task = $this->createNewTask($taskId, $userId, $name, $dueDate);
        $doneTask = $task->done();

        $this->assertSame($taskId->id(), $doneTask->id());
        $this->assertSame($userId->id(), $task->userId());
        $this->assertSame($name, $doneTask->name());
        $this->assertSame(Status::Done->value, $doneTask->status());
        $this->assertEquals(new DateTimeImmutable('2022-01-01'), $doneTask->dueDate());
        $this->assertSame(0, $doneTask->postponeCount());
    }

    public function testタスクを3回まで延期できること(): void
    {
        $taskId = new TaskId(UlidGenerator::generate());
        $userId = new UserId(UlidGenerator::generate());
        $name = 'テスト';
        $dueDate = new DateTimeImmutable('2022-01-01');

        $task = $this->createNewTask($taskId, $userId, $name, $dueDate);
        $postpone1Task = $task->postpone();
        $postpone2Task = $postpone1Task->postpone();
        $postpone3Task = $postpone2Task->postpone();

        $this->assertSame($taskId->id(), $postpone3Task->id());
        $this->assertSame($userId->id(), $task->userId());
        $this->assertSame($name, $postpone3Task->name());
        $this->assertSame(Status::Undone->value, $postpone3Task->status());
        $this->assertEquals(new DateTimeImmutable('2022-01-04'), $postpone3Task->dueDate());
        $this->assertSame(3, $postpone3Task->postponeCount());
    }

    public function testタスクを4回延期すると失敗すること(): void
    {
        $taskId = new TaskId(UlidGenerator::generate());
        $userId = new UserId(UlidGenerator::generate());
        $name = 'テスト';
        $dueDate = new DateTimeImmutable('2022-01-01');

        $task = $this->createNewTask($taskId, $userId, $name, $dueDate);
        $postpone1Task = $task->postpone();
        $postpone2Task = $postpone1Task->postpone();
        $postpone3Task = $postpone2Task->postpone();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('最大延期回数を超えています');

        $postpone3Task->postpone();
    }

    private function createNewTask(
        TaskId $taskId,
        UserId $userId,
        string $name,
        DateTimeImmutable $dueDate,
    ): Task {
        return Task::create(
            taskId: $taskId->id(),
            userId: $userId->id(),
            name: $name,
            status: Status::Undone->value,
            dueDate: $dueDate,
            postponeCount: 0,
        );
    }
}
