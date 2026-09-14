<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'satker_id' => ['required', 'integer', 'exists:satker,id'],
            'event_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'registration_start' => ['required', 'date'],
            'registration_end' => ['required', 'date'],
            'quota' => ['required', 'integer'],
            'status' => ['required', 'string', 'max:255'],
        ];
    }
}