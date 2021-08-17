<?php

namespace App\Http\Requests;

use App\Models\ProductCrustSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductCrustSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_crust_size_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'crust_id' => [
                'required',
                'integer',
            ],
            'size_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
