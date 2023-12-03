<?php

declare(strict_types=1);

namespace Todo\Infra\Gateway;

use App\Jobs\SendMail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Todo\Application\Boundary\MailSender;

final class LaravelMailSender implements MailSender
{
    public function sendMail(string $view, array $data, string $subject, string $to): void
    {
        Mail::send($view, $data, static fn (Message $message) => $message
            ->subject($subject)
            ->to($to)
        );
    }

    public function sendQueue(string $view, array $data, string $subject, string $to): void
    {
        SendMail::dispatch($view, $data, $subject, $to);
    }
}
