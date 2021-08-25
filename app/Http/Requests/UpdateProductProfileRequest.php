<?php

namespace App\Http\Requests;

use App\Models\ProductProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_profile_edit');
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
