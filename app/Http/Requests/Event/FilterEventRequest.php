<?php

namespace App\Http\Requests\Event;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FilterEventRequest extends FormRequest
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
            'search' => ['nullable', 'string','max:255'],

            // in isinya hanya yang sudah di tentukan
            'sort' => ['nullable', 'in:latest,oldest'],
            'location' => ['nullable','string', 'max:255'],
             'location_area' => ['nullable','string', 'max:255'],

            //  ini untuk mengecek wadah arraynya lalu bawahnya cek isi array
            'formats' => ['nullable', 'array'],
            'formats.*' => ['string', 'in:offline,online'],

            // satker harus yang ada dalam tabel satker
            'satker' =>['integer','exists:satker,id'],

            // isinya hanya rentang yang di tentukan
            'month' => ['nullable','integer', 'between:1,12'],
            'start_date'=>['nullable','date'],

            // after or, isinya harus sama atau setelah tanggal stardate
            'end_date' =>['nullable', 'date','after_or_equal:start_date']

        ];
    }
}
