<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

/**
 * 活動レポート
 */
final readonly class ActivityReport
{
    public function __construct(
        private ActivityReportId $activityReportId,
        private string $details,
    ) {
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
