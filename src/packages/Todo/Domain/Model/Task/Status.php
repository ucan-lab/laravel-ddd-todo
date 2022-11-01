<?php

declare(strict_types=1);

namespace Todo\Domain\Model\Task;

enum Status: string
{
    case Undone = 'undone';
    case Done = 'done';
}
