<?php

namespace App\Http\Requests;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CalcTotalPriceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'products'            => ['required', 'array'],
            'products.*.product'  => ['required', 'integer', sprintf('exists:%s,id', Product::class)],
            'products.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
            'plan'                => ['required', 'integer', sprintf('exists:%s,id', Plan::class)]
        ];
    }
}
