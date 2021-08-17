<?php

namespace App\Http\Requests;

use App\Models\DishIngredient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDishIngredientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dish_ingredient_edit');
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
