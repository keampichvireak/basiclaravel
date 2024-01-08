<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'model' => 'nullable',
            'quantity' => 'nullable',
            'total' => 'nullable',
            'user_order' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'cardname' => 'required|string|min:5',
            'cardnumber' => 'required|integer|min:8',
        ];
    }
}
