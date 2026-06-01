<?php

namespace App\Http\Requests\Notification;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreNotification extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'text' => 'required|string|max:500',
            'channel' => 'required|string|in:email,telegram',
            'channel_data' => 'required|json',
            'status' => 'required|string|in:pending,sent,error',
            'attempts' => 'required|integer|min:0',
            'last_error' => 'nullable|string|max:500',
            'next_attempt_at' => 'nullable|date',
            'sent_at' => 'nullable|date',
        ];
    }
}
