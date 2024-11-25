<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category' => 'required|uuid|exists:categories,id',
            'name' => 'required|string|max:100',
            'sku' => 'nullable|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'photos' => 'sometimes|array',
            'photos.*' => 'sometimes|file|image|mimes:jpg,png,jpeg|max:2048',
            'photo_old' => 'sometimes|array',
            'photo_old.*' => 'sometimes|uuid|exists:product_photos,id',
        ];
    }
}
