<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

use DateTimeImmutable;
use LogicException;
use Todo\Domain\Model\User\UserId;

/**
 * タスク
 */
final readonly class Task
{
    public function __construct(
        private TaskId $id,
        private UserId $userId,
        private string $name,
        private Status $status,
        private DateTimeImmutable $dueDate,
        private PostponeCount $postponeCount,
    ) {
    }

    /**
     * 延期する
     *
     * @return $this
     * @throws LogicException
     */
    public function postpone(): self
    {
        if ($this->status === Status::Done) {
            throw new LogicException('既にタスクが完了しています。');
        }

        return new self(
            $this->id,
            $this->userId,
            $this->name,
            $this->status,
            $this->dueDate->modify('+1 day'),
            $this->postponeCount->increment(),
        );
    }

    /**
     * 完了する
     *
     * @return $this
     * @throws LogicException
     */
    public function done(): self
    {
        if ($this->status === Status::Done) {
            throw new LogicException('既にタスクが完了しています。');
        }

        return new self(
            $this->id,
            $this->userId,
            $this->name,
            Status::Done,
            $this->dueDate,
            $this->postponeCount,
        );
    }

    public function id(): string
    {
        return $this->id->id();
    }

    public function userId(): string
    {
        return $this->userId->id();
    }

    public function name(): string
    {
        return $this->name;
    }

    public function status(): string
    {
        return $this->status->value;
    }

    public function dueDate(): DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function postponeCount(): int
    {
        return $this->postponeCount->value();
    }
}
