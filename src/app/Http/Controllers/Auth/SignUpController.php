<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Register\SignUpRequest;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Todo\Application\Service\User\RegisterUserUseCase;
use Todo\Application\Service\User\RegisterUserUseCaseInput;

final class SignUpController extends Controller
{
    public function __invoke(SignUpRequest $request, RegisterUserUseCase $useCase): RedirectResponse
    {
        $input = new RegisterUserUseCaseInput(
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
