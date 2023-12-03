<?php

declare(strict_types=1);

namespace Todo\Application\Boundary;

interface MailSender
{
    public function sendMail(string $view, array $data, string $subject, string $to): void;
    public function sendQueue(string $view, array $data, string $subject, string $to): void;
}
