<?php

namespace App\Http\Requests;

use App\Models\ProductCrust;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductCrustRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_crust_create');
    }

    public function rules()
    {
        return [
            'crusts.*' => [
                'integer',
            ],
            'crusts' => [
                'array',
            ],
        ];
    }
}
