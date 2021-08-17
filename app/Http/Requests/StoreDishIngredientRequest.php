<?php

namespace App\Http\Requests;

use App\Models\DishIngredient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDishIngredientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dish_ingredient_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
