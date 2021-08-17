<?php

namespace App\Http\Requests;

use App\Models\Dish;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDishRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dish_edit');
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
