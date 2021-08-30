<?php

namespace App\Http\Requests;

use App\Models\IngredientsSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIngredientsSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ingredients_size_create');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
        ];
    }
}
