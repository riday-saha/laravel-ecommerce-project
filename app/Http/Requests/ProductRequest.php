<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' =>['required','max:30'],
            'description' => ['required', 'string','regex:/^[\s\S]*[a-zA-Z]+[\s\S]*$/'],
            'image' =>['required','mimes:png,jpg,jpeg'],
            'category' =>['required'],
            'price' =>['required','numeric'],
            'quantity' =>['required','numeric']
        ];
    }
}
