<?php

namespace App\Http\Requests;

use App\Models\ProductCrust;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductCrustRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_crust_edit');
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
