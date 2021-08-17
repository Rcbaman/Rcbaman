<?php

namespace App\Http\Requests;

use App\Models\Crust;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrustRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crust_create');
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
