<?php

declare(strict_types=1);

namespace Todo\Infra\Domain\Model\ActivityReport;

use Psr\Log\LoggerInterface;
use Todo\Domain\Model\ActivityReport\ActivityReport;
use Todo\Domain\Model\ActivityReport\ActivityReportRepository;

final readonly class LogActivityReportRepository implements ActivityReportRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function create(ActivityReport $activityReport): void
    {
        $this->logger->info($activityReport->details());
    }
}
