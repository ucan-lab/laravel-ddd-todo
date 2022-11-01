<?php

declare(strict_types=1);

namespace Todo\Lang;

interface Notification
{
    public function title(): string;

    public function body(): string;
}
