<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskPostponeRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Todo\Application\Task\TaskPostponeUseCase;
use Todo\Application\Task\TaskPostponeUseCaseInput;

final class TaskPostponeController extends Controller
{
    public function __invoke(
        TaskPostponeRequest $request,
        TaskPostponeUseCase $useCase,
        string $taskId,
    ): RedirectResponse {
        $input = new TaskPostponeUseCaseInput($taskId);

        try {
            $useCase->postpone($input);
        } catch (Exception $exception) {
            $this->session->flash(self::SESSION_FAILURE, $exception->getMessage());

            return $this->redirector->back();
        }

        $this->session->flash(self::SESSION_SUCCESS, $this->translator->get('messages.tasks.postpone.success'));

        return $this->redirector->route('tasks.index');
    }
}
