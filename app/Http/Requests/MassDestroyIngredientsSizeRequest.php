<?php

namespace App\Http\Requests;

use App\Models\IngredientsSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIngredientsSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ingredients_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ingredients_sizes,id',
        ];
    }
}
