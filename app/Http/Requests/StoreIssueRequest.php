<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssueRequest extends FormRequest
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
        return [
            'departemenID' => 'required|exists:departemen,id',
            'teknisiID' => 'nullable|exists:teknisi,id',
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'note' => 'nullable',
            'hardwareID.*' => 'required|exists:hardware,id'

        ];
    }
}
