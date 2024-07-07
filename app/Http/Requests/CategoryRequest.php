<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category' =>'required|string|regex:/^[\s\S]*[a-zA-Z]+[\s\S]*$/'
        ];
    }

    public function messages(){
        return[
            'category.required' => 'Category name is required',
            'category.regex' => 'Category must have letter'
        ];
    }

}
