<?php

declare(strict_types=1);

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

final class ResetPasswordUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ];
    }
}
