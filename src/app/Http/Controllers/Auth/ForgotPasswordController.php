<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\ForgotPasswordRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Password\SendPasswordResetUseCase;
use Todo\Application\Password\SendPasswordResetUseCaseInput;
use Todo\Domain\Model\User\NotFoundUserException;

final class ForgotPasswordController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(ForgotPasswordRequest $request, SendPasswordResetUseCase $useCase): RedirectResponse
    {
        $email = $request->input('email');
        $input = new SendPasswordResetUseCaseInput($email);

        try {
            $useCase->send($input);
        } catch (NotFoundUserException) {
            return $this->redirector->back()
                ->with(self::SESSION_FAILURE, '入力されたメールアドレスは存在しません。');
        }

        return $this->redirector->back()
            ->with(self::SESSION_SUCCESS, 'パスワードリセットメールを送信しました。');
    }
}
