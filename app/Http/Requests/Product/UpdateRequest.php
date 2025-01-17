<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class  UpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255', // Title is required, must be a string, and max length of 255
            'description' => 'required|string|max:1000', // Description is required, must be a string, and max length of 1000
            'content' => 'nullable|string', // Content is optional, but if provided, it should be a string
            'preview_img' => 'required', // Preview image is required, must be an image, and limit size to 2MB
            'price' => 'required|integer|min:0', // Price is required, must be an integer and greater than or equal to 0
            'count' => 'required|integer|min:0', // Count is required, must be an integer and greater than or equal to 0
            'is_published' => 'nullable|boolean', // is_published is required, and should be a boolean value (0 or 1)
            'category_id' => 'nullable|exists:categories,id', // category_id is optional, but if provided, it must exist in the categories table
            'colors' => 'nullable|array'
        ];
    }
}
