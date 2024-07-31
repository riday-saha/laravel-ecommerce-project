<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' =>['nullable','max:30'],
            'description' => ['nullable','string','regex:/^[\s\S]*[a-zA-Z]+[\s\S]*$/'],
            'image' =>['nullable','mimes:png,jpg,jpeg'],
            'category' =>['nullable','nullable'],
            'price' =>['nullable','numeric'],
            'quantity' =>['nullable','numeric']
        ];
    }
}
