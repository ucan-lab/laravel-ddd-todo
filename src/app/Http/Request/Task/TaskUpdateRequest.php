<?php

declare(strict_types=1);

namespace App\Http\Request\Task;

use Illuminate\Foundation\Http\FormRequest;

final class TaskUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'タスク名',
        ];
    }
}
