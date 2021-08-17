<?php

namespace App\Http\Requests;

use App\Models\VariationsSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVariationsSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('variations_size_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
