<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Todo\Application\Boundary\MailSender;

final class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly string $view,
        private readonly array $data,
        private readonly string $subject,
        private readonly string $to,
    ) {
    }

    public function handle(MailSender $mailSender): void
    {
        $mailSender->sendMail(
            $this->view,
            $this->data,
            $this->subject,
            $this->to,
        );
    }
}
