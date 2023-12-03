<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

final readonly class ActivityReportId
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
