<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\ActivityReport;

use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportFactory;
use Todo\Domain\Model\ActivityReport\ActivityReportId;
use Todo\Domain\Model\Task\Task;
use Todo\Lang\UlidGenerator;

final class ConcreteActivityReportFactory implements ActivityReportFactory
{
    public function createTask(Task $task): ActivityReport
    {
        return new ActivityReport($this->factoryActivityReportId(), $task->userId() . ' のユーザーが ' . $task->id() . ' のタスクを作成しました。');
    }

    public function updateTask(Task $task): ActivityReport
    {
        return new ActivityReport($this->factoryActivityReportId(), $task->userId() . ' のユーザーが ' . $task->id() . ' のタスクを更新しました。');
    }

    public function postponeTask(Task $task): ActivityReport
    {
        return new ActivityReport($this->factoryActivityReportId(), $task->userId() . ' のユーザーが ' . $task->id() . ' のタスクを延期しました。');
    }

    public function doneTask(Task $task): ActivityReport
    {
        return new ActivityReport($this->factoryActivityReportId(), $task->userId() . ' のユーザーが ' . $task->id() . ' のタスクが完了しました。');
    }

    private function factoryActivityReportId(): ActivityReportId
    {
        return new ActivityReportId(UlidGenerator::generate());
    }
}
