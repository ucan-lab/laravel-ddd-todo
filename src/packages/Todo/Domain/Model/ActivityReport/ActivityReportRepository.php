<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

interface ActivityReportRepository
{
    public function create(ActivityReport $activityReport): void;
}
