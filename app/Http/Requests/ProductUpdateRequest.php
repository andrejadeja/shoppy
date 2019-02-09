<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->isAn('admin'))
            return true;


        elseif(auth()->user()->shop && auth()->user()->shop->id == request('shop_id'));
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
            'product' => 'required',
            'category_id' => 'required',
            'product_number' => 'required',
            'price' => 'required',
        ];
    }
}
