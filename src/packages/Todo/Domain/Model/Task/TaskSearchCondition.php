<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

use Todo\Domain\Model\User\UserId;

/**
 * タスク検索条件
 */
final class TaskSearchCondition
{
    public function __construct(
        private readonly UserId $userId,
        private readonly ?Status $status,
    ) {
    }

    public function userId(): string
    {
        return $this->userId->id();
    }

    public function status(): ?string
    {
        return $this->status?->value;
    }
}
