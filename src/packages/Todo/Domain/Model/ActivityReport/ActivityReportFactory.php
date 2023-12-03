<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

use Todo\Domain\Model\Task\Task;

interface ActivityReportFactory
{
    public function createTask(Task $task): ActivityReport;

    public function updateTask(Task $task): ActivityReport;

    public function postponeTask(Task $task): ActivityReport;

    public function doneTask(Task $task): ActivityReport;
}
