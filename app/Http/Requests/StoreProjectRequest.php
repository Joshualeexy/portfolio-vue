<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|string',
            'category' => 'required|string',
            'category_other' => 'string',
            'description' => 'required|string',
            'preview' => 'required|boolean',
            'preview_url' => '',
            'source' => 'required|boolean',
            'source_url' => '',
            'share' => 'string',
            'skills' => 'required|string',
            'other' => 'required|string',
            'image' => 'required|file',
        ];
    }
}
