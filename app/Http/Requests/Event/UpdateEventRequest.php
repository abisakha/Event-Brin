<?php

namespace App\Http\Requests\Event;

use App\Enums\Event\EventStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
           'event_name' => ['required','string','max:255'],
            'event_image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'description' => ['nullable','string'],
            // tanyakan rule
            'format' => ['required',Rule::in(['offline','online'])],
            'location_area' => ['nullable','required_if:format,offline','string','max:255'],
            'location' => ['required','string','max:255'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after:start_date'],
            'registration_start' => ['required','date'],
            'registration_end' => ['required','date','after:registration_start','before_or_equal:start_date'],
            'quota' => ['required','integer','min:1'],
            'status' => ['required',Rule::enum(EventStatus::class)],
        ];
    }
}
