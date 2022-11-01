<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Register\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Todo\Application\User\UserRegisterUseCase;
use Todo\Application\User\UserRegisterUseCaseInput;

final class SignUpController extends Controller
{
    public function __invoke(RegisterRequest $request, UserRegisterUseCase $useCase): RedirectResponse
    {
        $input = new UserRegisterUseCaseInput(
            (string) $request->input('name'),
            (string) $request->input('email'),
            (string) $request->input('password'),
        );

        try {
            $output = $useCase->register($input);
        } catch (Throwable $exception) {
            return $this->redirector
                ->back()
                ->withErrors(['danger' => $exception->getMessage()]);
        }

        $this->auth->loginUsingId($output->userId);
        $this->logger->info('Completed sign up process. userId: ' . $output->userId);

        return $this->redirector->route('dashboard');
    }
}
