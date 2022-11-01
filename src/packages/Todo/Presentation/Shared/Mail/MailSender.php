<?php

declare(strict_types=1);

namespace Todo\Presentation\Shared\Mail;

interface MailSender
{
    public function send(array $to, string $title, string $body);
}
