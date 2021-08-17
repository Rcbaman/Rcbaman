<?php

namespace App\Http\Requests;

use App\Models\Dish;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDishRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dish_create');
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
