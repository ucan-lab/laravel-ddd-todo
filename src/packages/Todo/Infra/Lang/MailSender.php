<?php

declare(strict_types=1);

namespace Todo\Infra\Lang;

interface MailSender
{
    public function send(Mail $mail): void;
}
