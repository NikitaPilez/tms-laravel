<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'short_description' => 'nullable|min:2',
            'price' => 'required',
            'sale_price' => 'nullable|numeric',
            'category' => 'nullable|integer',
            'status' => 'nullable',
            'description' => 'required|min:2',
        ];
    }
}
