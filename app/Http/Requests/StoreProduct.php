<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required',
            'product' => 'required',
            'product_number' => 'required|unique:products',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png',
        ];
    }
}
