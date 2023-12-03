<?php

declare(strict_types=1);

namespace Todo\Application\Task;

use DateTimeImmutable;

final readonly class CreateTaskUseCaseInput
{
    public function __construct(
        public string $userId,
        public string $name,
        public DateTimeImmutable $dueDate
    ) {
    }
}
