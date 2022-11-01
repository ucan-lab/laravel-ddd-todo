<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

use Todo\Domain\Model\Task\Task;

/**
 * 活動レポート
 */
final class ActivityReport
{
    private function __construct(
        private readonly ActivityReportId $activityReportId,
        private readonly string $details,
    ) {
    }

    /**
     * @return static
     */
    public static function createTask(ActivityReportId $activityReportId, Task $task): self
    {
        return new self($activityReportId, $task->name().'のタスクを作成しました。');
    }

    /**
     * @return static
     */
    public static function postponeTask(ActivityReportId $activityReportId, Task $task): self
    {
        return new self($activityReportId, $task->name().'のタスクを延期しました。');
    }

    /**
     * @return static
     */
    public static function doneTask(ActivityReportId $activityReportId, Task $task): self
    {
        return new self($activityReportId, $task->name().'のタスクが完了しました。');
    }

    public function id(): string
    {
        return $this->activityReportId->id();
    }

    public function details(): string
    {
        return $this->details;
    }
}
