<?php

declare(strict_types=1);

namespace Todo\Lang;

interface Mail
{
    public function subject(): string;

    public function to(): string;

    public function view(): string;

    public function data(): array;
}
