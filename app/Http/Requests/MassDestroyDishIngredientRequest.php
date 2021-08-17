<?php

namespace App\Http\Requests;

use App\Models\DishIngredient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDishIngredientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dish_ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dish_ingredients,id',
        ];
    }
}
