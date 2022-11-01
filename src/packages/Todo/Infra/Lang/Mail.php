<?php

declare(strict_types=1);

namespace Todo\Infra\Lang;

interface Mail
{
    public function title(): string;

    public function contents(): string;
}
