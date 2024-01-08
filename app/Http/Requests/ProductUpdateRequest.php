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
        $product_id = $this->route('product')->id;

        return [
            'brand' => 'required',
            'model' => 'required',
            'processor' => 'required',
            'ram' => 'required',
            'storange_capcity' => 'required',
            'display_size' => 'required',
            'graphic_card' => 'required',
            'warranty_period' => 'required',
            'image' => 'nullable|image',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'quantity' => 'required|integer',

        ];
    }
}
