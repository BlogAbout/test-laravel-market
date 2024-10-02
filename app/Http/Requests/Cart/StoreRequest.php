<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productId' => 'required|integer|exists:tlm_products,id',
            'qty' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'productId.required' => __('Это поле обязательно для заполнения'),
            'productId.integer' => __('Значение данного поля должно быть числом'),
            'productId.exists' => __('Товар отсутствует в базе данных'),
            'qty.required' => __('Это поле обязательно для заполнения'),
            'qty.numeric' => __('Значение данного поля должно быть числом')
        ];
    }
}
