<?php

namespace App\Http\Requests;

use App\Models\ProductIngredient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductIngredientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_ingredient_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'ingredients.*' => [
                'integer',
            ],
            'ingredients' => [
                'array',
            ],
        ];
    }
}
