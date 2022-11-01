<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskDoneRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Task\TaskDoneUseCase;
use Todo\Application\Task\TaskDoneUseCaseInput;

final class TaskDoneController extends Controller
{
    public function __invoke(
        TaskDoneRequest $request,
        TaskDoneUseCase $useCase,
        string $taskId
    ): RedirectResponse {
        $input = new TaskDoneUseCaseInput($taskId);

        try {
            $useCase->done($input);
        } catch (Exception $exception) {
            $this->session->flash(self::SESSION_FAILURE, $exception->getMessage());

            return $this->redirector->back();
        }

        $this->session->flash(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.done.success'));

        return $this->redirector->route('tasks.index');
    }
}
