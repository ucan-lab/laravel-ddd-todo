<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Service\Task\UpdateTaskUseCase;
use Todo\Application\Service\Task\UpdateTaskUseCaseInput;

final class TaskUpdateController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(
        TaskUpdateRequest $request,
        UpdateTaskUseCase $useCase,
        string $task,
    ): RedirectResponse {
        $input = new UpdateTaskUseCaseInput(
            $this->auth->id(),
            $task,
            (string) $request->input('name'),
        );

        $useCase->updateTask($input);

        return $this->redirector->route('tasks.index')
            ->with(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.update.success'));
    }
}
