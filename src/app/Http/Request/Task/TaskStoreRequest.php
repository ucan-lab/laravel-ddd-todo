<?php

declare(strict_types=1);

namespace App\Http\Request\Task;

use Illuminate\Foundation\Http\FormRequest;

final class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'dueDate' => ['required', 'date'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'タスク名',
            'dueDate' => '期日',
        ];
    }
}
