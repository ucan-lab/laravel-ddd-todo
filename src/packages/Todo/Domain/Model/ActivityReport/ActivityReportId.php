<?php

declare(strict_types=1);

namespace Todo\Domain\Model\ActivityReport;

use Todo\Lang\Ulid;

final class ActivityReportId
{
    public function __construct(private readonly Ulid $id)
    {
    }

    public function id(): string
    {
        return $this->id->id();
    }
}
