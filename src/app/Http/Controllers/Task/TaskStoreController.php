<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskStoreRequest;
use DateTimeImmutable;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Task\TaskCreateUseCase;
use Todo\Application\Task\TaskCreateUseCaseInput;

final class TaskStoreController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(TaskStoreRequest $request, TaskCreateUseCase $useCase): RedirectResponse
    {
        $input = new TaskCreateUseCaseInput(
            $this->auth->id(),
            (string) $request->input('name'),
            new DateTimeImmutable($request->input('dueDate'))
        );

        $useCase->create($input);

        $this->session->flash(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.store.success'));

        return $this->redirector->route('tasks.index');
    }
}
