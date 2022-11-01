<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\ForgotPasswordRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Password\SendPasswordResetUseCase;
use Todo\Application\Password\SendPasswordResetUseCaseInput;

final class ForgotPasswordController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(ForgotPasswordRequest $request, SendPasswordResetUseCase $useCase): RedirectResponse
    {
        $email = $request->input('email');

        $input = new SendPasswordResetUseCaseInput($email);
        $useCase->send($input);

        return $this->redirector->back()
            ->with(self::SESSION_SUCCESS, 'パスワードリセットメールを送信しました。');
    }
}
