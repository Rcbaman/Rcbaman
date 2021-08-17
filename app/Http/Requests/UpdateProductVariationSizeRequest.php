<?php

namespace App\Http\Requests;

use App\Models\ProductVariationSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductVariationSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_variation_size_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'variationsize_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
