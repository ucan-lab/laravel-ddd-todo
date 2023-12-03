<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskStoreRequest;
use DateTimeImmutable;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Task\CreateTaskUseCase;
use Todo\Application\Task\CreateTaskUseCaseInput;

final class TaskStoreController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(
        TaskStoreRequest $request,
        CreateTaskUseCase $useCase,
    ): RedirectResponse {
        $input = new CreateTaskUseCaseInput(
            $this->auth->id(),
            (string) $request->input('name'),
            new DateTimeImmutable($request->input('dueDate'))
        );

        $useCase->createTask($input);

        $this->session->flash(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.store.success'));

        return $this->redirector->route('tasks.index');
    }
}
