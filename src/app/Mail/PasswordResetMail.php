<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;

final class PasswordResetMail extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        private readonly string $url,
        private readonly int $expireMinutes,
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->from('app@example.com')
            ->subject('パスワードリセットリンク')
            ->view('email.password_resets')
            ->with([
                'url' => $this->url,
                'expireMinutes' => $this->expireMinutes,
            ]);
    }
}
