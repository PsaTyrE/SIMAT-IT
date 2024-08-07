<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIssueRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $statuses = ['open', 'onhold', 'complete']; // Define possible statuses

        return [
            'teknisiID' => 'required|exists:teknisi,id',
            'note' => 'required|string',
            'status' => ['required', Rule::in($statuses)], // Validate against predefined statuses
            'updated_at_date' => 'required|date_format:Y-m-d',
            'updated_at_time' => 'required|date_format:H:i',
        ];
    }
}
